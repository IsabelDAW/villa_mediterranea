@extends('layouts.layout')

@section('content')
<div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-4"><i class="fas fa-users-cog me-2"></i> Gestión de Usuarios</h2>
    <a href="{{ route('perfil') }}" 
   class="btn btn-dark border-white text-white px-4 shadow-sm d-inline-block">
   Volver
</a>
          
    </div>
    <div class="card shadow border-0">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->nombre }} {{ $u->apellidos }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->telefono ?? 'No indicado' }}</td>
                        <td>
                            <span class="badge {{ $u->rol == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                {{ ucfirst($u->rol) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-dark">
                             <a href="{{ route('perfil.edit', $u->id) }}">
                                <i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection