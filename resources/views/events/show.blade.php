@extends('layouts.main')
@section('title', $event->title)
@section('content')

<div id="event-container" class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
            <p class="event-participants"><ion-icon name="people-outline"></ion-icon> {{ $event->users->count() }} Participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
            <p class="event-date"><ion-icon name="calendar-outline"></ion-icon> {{date('d/m/Y', strtotime($event->date))}}</p>
            @if(!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
                @csrf
                <a href="/events/join/{{ $event->id }}" 
                   class="btn btn-primary"
                   onclick="event.preventDefault();
                   this.closest('form').submit();">
                   Confirmar Presença
                </a>
            </form>
            @else
                <div class="already-joined-msg">
                    Você já está participando deste evento!
                </div>
            @endif
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($event->itens as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                @endforeach
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>

@endsection