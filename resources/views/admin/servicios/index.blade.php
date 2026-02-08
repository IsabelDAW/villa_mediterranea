@extends('layouts.layout')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Gestión de Servicios y Experiencias</h2>
        <a href="{{ route('admin.servicios.create') }}" class="btn btn-primary">+ Nuevo</a>
    </div>

    <table class="table table-hover bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($elementos as $item)
            <tr>
                <td>{{ $item->nomServExp }}</td>
                <td>{{ $item->tipo == 's' ? 'Servicio' : 'Experiencia' }}</td>
                <td><small>{{ $item->imagen }}</small></td>
                <td>
                    <a href="{{ route('admin.servicios.edit', $item->id_servExp) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Modificar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection