<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index() {
        $search = request('search');
        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function contact() {
        return view('contact');
    }

    public function products() {
        $busca = request('search');
        return view('products', ['busca' => $busca]);
    }

    public function product($id = null) {
        return view('product', ['id' => $id]);
    }

    public function store(Request $request) {

        $event = new Event;

        $event->title       = $request->title;
        $event->date        = $request->date;
        $event->city        = $request->city;
        $event->private     = $request->private;
        $event->description = $request->description;
        $event->itens       = $request->itens;

        // Image Upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            if ($file->isValid()) {

                $destinationPath = public_path('img/events');

                // cria a pasta se não existir
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $imageName = uniqid('event_', true) . '.' . $file->getClientOriginalExtension();

                // tenta mover e confirma se existe
                $file->move($destinationPath, $imageName);

                if (!file_exists($destinationPath . DIRECTORY_SEPARATOR . $imageName)) {
                    dd("Move ran but file not found after move", $destinationPath, $imageName);
                }

                $event->image = $imageName;

                } else {
                    dd("Invalid upload", $file->getError(), $file->getErrorMessage());
                }
            }

        // Set the event's user_id to the currently authenticated user's id
        $user = auth()->user();
        $event->user_id = $user->id;
        
        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                    break;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', 
            ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]
        );
    }

    public function destroy($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('/dashboard')->with('msg', 'Você não tem permissão para deletar este evento.');
        }

        $event->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');
    }

    public function edit($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        if ($user->id != $event->user_id) {
            return redirect('/dashboard')->with('msg', 'Você não tem permissão para editar este evento.');
        }

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $id) {
        $user = auth()->user();
    
        // Image Upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            if ($file->isValid()) {

                $destinationPath = public_path('img/events');

                // cria a pasta se não existir
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $imageName = uniqid('event_', true) . '.' . $file->getClientOriginalExtension();

                // tenta mover e confirma se existe
                $file->move($destinationPath, $imageName);

                if (!file_exists($destinationPath . DIRECTORY_SEPARATOR . $imageName)) {
                    dd("Move ran but file not found after move", $destinationPath, $imageName);
                }

                $data['image'] = $imageName;

                } else {
                    dd("Invalid upload", $file->getError(), $file->getErrorMessage());
                }
            }
        $event = Event::findOrFail($id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvent($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        // Verifica se o usuário já está cadastrado neste evento
        if ($user->eventsAsParticipant()->where('event_id', $id)->exists()) {
            return redirect('/dashboard/')->with('msg', 'Você já está cadastrado neste evento!');
        }

        $user->eventsAsParticipant()->attach($id);

        return redirect('/dashboard/')->with('msg', 'Sua participação foi confirmada com sucesso!' . $event->title);
    }

    public function leaveEvent($id) {
        $user = auth()->user();
        $event = Event::findOrFail($id);

        $user->eventsAsParticipant()->detach($id);

        return redirect('/dashboard/')->with('msg', 'Você saiu com sucesso do evento ' . $event->title);
    }
}
