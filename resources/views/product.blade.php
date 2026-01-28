@extends('layouts.main')
@section('title', 'Produto')

@section('content')
    @if($id != null)
        <p>Exibindo Produto ID: {{ $id }}</p>
    @endif
@endsection 