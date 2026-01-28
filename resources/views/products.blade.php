@extends('layouts.main')
@section('title', 'Produtos')

@section('content')

<h1>Esta é a aba de produtos</h1>
@if($busca != '')
    <p>Você realizou uma busca por: {{ $busca }}</p> 
@endif   

<a href="/"><button>Home</button></a>

@endsection
 