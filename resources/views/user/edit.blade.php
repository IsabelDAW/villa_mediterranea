@extends('layouts.layout') 

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white p-4">
                    <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i> Editar mi Perfil</h4>
                </div>
                <div class="card-body p-4">
                   <!-- Formulario que apunta a la ruta 'update' en login controller -->
                    <form action="{{ route('perfil.update') }}" method="POST" class="needs-validation" novalidate>
                        @csrf <!--sin esto, laravel rechazaria el formulario por seguridad--->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="inputNombre" class="form-label fw-bold" >Nombre</label>
                                    <!--Valores actúales de la base de datos que los trae de desde el controlador mediante compact user-->
                                <input type="text" name="nombre" id="inputNombre" class="form-control @error('nombre') is-invalid 
                                @enderror" value="{{old('nombre', $user->nombre) }}" required 
                                 pattern="^[a-zA-ZÀ-ÿ\s']+$" title="El nombre solo puede contener letras y espacios, no números.">
     <!-- Error del Navegador (Frontend) con bootstrap-->
    <div class="invalid-feedback">
        El nombre no es válido (solo letras).
    </div>

    <!-- Error de Laravel (Backend) -->
    @error('nombre')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
                            </div>

           

                            <div class="col-md-6 mb-3">
                                <label for="inputApellidos" class="form-label fw-bold">Apellidos</label>
                                     <!--Valores actúales de la base de datos-->
                                <input type="text" name="apellidos" id="inputApellidos" class="form-control" 
                                @error('apellidos') is-invalid @enderror
                                value="{{ old('apellidos', $user->apellidos) }}" required pattern="^[a-zA-ZÀ-ÿ\s']+$" 
                                title="El nombre solo puede contener letras y espacios, no números.">

        <!-- Error del Navegador (Frontend) con bootstrap-->
    <div class="invalid-feedback">
        El apellido no es válido (solo letras).
    </div>

    <!-- Error de Laravel (Backend) -->
    @error('apellidos')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
                                </div>

                        </div>

                        <div class="mb-3">
                            <label for= "inputEmail" class="form-label fw-bold">Correo Electrónico</label>
                                    <!--Valores actúales de la base de datos-->
                            <input type="email" name="email" id="inputEmail" class="form-control" value="{{ old("email", $user->email) }}" required>
                       

   <!-- Error del Navegador (Frontend) con bootstrap-->
    <div class="invalid-feedback">
        Por favor, introduce un formato de email correcto.
    </div>

    <!-- Error de Laravel (Backend) -->
    @error('email')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
                        </div>


                        <div class="mb-4">
                            <label for="telefonoInput">Teléfono de contacto</label>
                                     <!--Valores actúales de la base de datos-->
                            <input type="text" name="telefono" id="telefonoInput" class="form-control @error('telefono') is-invalid @enderror"
                             value="{{old('telefono', $user->telefono) }}" pattern="^(\+[0-9]{1,4})?[0-9]{9}$">

                               <!-- Error del Navegador (Frontend) con bootstrap-->
    <div class="invalid-feedback">
Introduce un teléfono válido (ej: +34 600000000)    </div>

    <!-- Error de Laravel (Backend) -->
    @error('telefono')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
                        </div>

   
                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('perfil') }}" class="text-muted text-decoration-none">
                                <i class="fas fa-arrow-left"></i> Cancelar y volver
                            </a>
                            <button type="submit" class="btn btn-dark px-4">
                                <i class="fas fa-save me-2"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
