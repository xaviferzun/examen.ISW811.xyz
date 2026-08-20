@extends('layouts.app')
@section('title', 'Editar solicitud')
@section('content')
    <h1 class="mb-4">Editar solicitud</h1>
    
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @method('PUT')
        @include('tickets._form')

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection