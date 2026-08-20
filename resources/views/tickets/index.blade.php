@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')
    @php
        //Adicional, añadi colores y etiquetas legibles para cada estado 
        $statusBadges = [
            'pending' => 'bg-secondary',
            'in_progress' => 'bg-warning text-dark',
            'resolved' => 'bg-success',
        ];
        $statusLabels = [
            'pending' => 'Pendiente',
            'in_progress' => 'En progreso',
            'resolved' => 'Resuelto',
        ];
    @endphp
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Solicitudes de soporte</h1>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Nueva solicitud</a>
    </div>

    
    <form method="GET" class="row g-2 mb-4">
        <div class="col-auto">
            <select name="category_id" class="form-select" onchange="this.form.submit()">
                <option value="">Todas las categorias</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">Todos los estados</option>
                @foreach (['pending' => 'Pendiente', 'in_progress' => 'En progreso', 'resolved' => 'Resuelto'] as $value => $label)
                    <option value="{{ $value }}" @selected(request('status') == $value)>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
        @if (request('category_id') || request('status'))
            <div class="col-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Limpiar filtro</a>
            </div>
        @endif
    </form>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->category->name }}</td>
                    {{-- <td>{{ $ticket->status }}</td> --}}
                    <td><span class="badge {{$statusBadges[$ticket->status]}}">{{$statusLabels[$ticket->status]}}</span></td>
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Eliminar esta solicitud?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay solicitudes registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection