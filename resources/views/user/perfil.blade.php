@extends('layouts.layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            {{-- Tarjeta Principal --}}
            <div class="card shadow border-0 overflow-hidden">
                <div class="card-header bg-dark text-white p-4 text-center">
                    <h3 class="mb-0 text-uppercase" style="letter-spacing: 2px;">Mi Perfil</h3>
                    <small class="opacity-75">Bienvenido a su área privada en la Villa</small>
                </div>

                {{-- Alerta/barra de éxito verde temporal --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-4 shadow-sm" 
                    role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body p-4 p-md-5">
                    {{-- SECCIÓN 1: DATOS PERSONALES --}}
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="text-muted small text-uppercase fw-bold">Nombre y Apellidos</label>
                                <p class="lead border-bottom pb-2">{{ $user->nombre }} {{ $user->apellidos }}</p>
                            </div>
                            <div class="mb-4">
                                <label class="text-muted small text-uppercase fw-bold">Teléfono de Contacto</label>
                                <p class="lead border-bottom pb-2">{{ $user->telefono }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="text-muted small text-uppercase fw-bold">Correo Electrónico</label>
                                <p class="lead border-bottom pb-2">{{ $user->email }}</p>
                            </div>
                            <div class="mb-4">
                                <label class="text-muted small text-uppercase fw-bold">Miembro desde</label>
                                <p class="lead border-bottom pb-2">{{ $user->fecha_registro }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- SECCIÓN 2: PANEL DE CONTROL (Solo Admin) --}}
                    @if(Auth::user()->rol === 'admin')
                    <div class="p-4 border rounded bg-light mb-5 shadow-sm">
                        <h5 class="text-dark mb-4 border-bottom pb-2 text-uppercase" 
                        style="font-size: 0.9rem;">
                            <i class="fas fa-lock me-2"></i>Panel de Control Administrativo
                        </h5>
                     <!---row crea la fila y g-3 (gutter) es el espacio exacto entre los botones.-->
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('admin.reservas.index') }}" class="btn btn-lg w-100 shadow-sm" 
                                style="background-color: #b89550; color: white;">
                                    <i class="fas fa-key me-2"></i>Gestión reservas
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.usuarios') }}" class="btn btn-outline-dark btn-lg w-100 shadow-sm">
                                    <i class="fas fa-users me-2"></i>Usuarios
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.servicios.index') }}" 
                                class="btn btn-primary btn-lg w-100 shadow-sm">
                                    <i class="fas fa-concierge-bell me-2"></i>Servicios
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- SECCIÓN 3: ACCIONES GENERALES --}}
                    <div class="pt-4 border-top">
                        <div class="row g-3 justify-content-center">
                            <div class="col-md-4">
                                <a href="{{ route('reservas.index') }}" class="btn btn-outline-secondary btn-lg w-100">
                                    <i class="fas fa-history me-2"></i>Mis Reservas
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('perfil.edit') }}" class="btn btn-dark btn-lg w-100">
                                    <i class="fas fa-edit me-2"></i>Editar mis datos
                                </a>
                            </div>
                        </div>
                    </div>

                </div> {{-- Fin Card Body --}}
            </div> {{-- Fin Card --}}
        </div>
    </div>
</div>
@endsection