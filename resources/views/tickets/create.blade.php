@extends('layouts.app')
@section('title', 'Nueva solicitud')
@section('content')
    <h1 class="mb-4">Nueva solicitud</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @include('tickets._form')

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection