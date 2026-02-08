@extends('layouts.layout') 

@section('content')
<div class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-5">
                                <h2 class="text-center" style="color: #2772c9; font-weight: bold;">Crear Cuenta</h2>
                            </div>
                        </div>
                    </div>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" class="needs-validation" novalidate>
                        @csrf <!--Sello de seguridad que le dice a laravel que el token es suyo-->

                        <div class="row gy-3 gy-md-4 overflow-hidden">
                            
                            <div class="col-12">
                           <label for="inputNombre" class="form-label">Nombre <span class="text-danger">*</span></label>
         <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          {{--   / .: Cualquier carácter/ *:Cero o más veces/ 
                                    \S: Cualquier carácter que NO sea un espacio en blanco. 
                                              .  * : Seguido de cualquier otra cosa.------}}
                        <input type="text" class="form-control" name="nombre" id="inputNombre" 
                        value="{{ old('apellidos') }}" required pattern="^[a-zA-ZÀ-ÿ\s']+$">
                       <div class="invalid-feedback">El nombre es obligatorio.</div>
            </div>
                                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="inputApellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    <input type="text" class="form-control" name="apellidos" id="inputApellidos" value="{{ old('apellidos') }}" required 
               pattern="^[a-zA-ZÀ-ÿ\s']+$"> <div class="invalid-feedback">El apellido es oligatorio</div>
                                @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="inputTelefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                <input type="tel" class="form-control" name="telefono" id="inputTelefono" 
                       value="{{ old('telefono') }}" required 
                       pattern="^(\+[0-9]{1,4})?[0-9]{9}$">
                <div class="invalid-feedback">Introduce un teléfono válido (ej: +34 600000000).</div>
            </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputEmail" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" required>
                                </div>
                                @error('email') <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            
                            <div class="col-12">
                               <label for="inputPassword" class="form-label">Contraseña <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password" id="inputPassword" 
                       required 
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}">
                <div class="invalid-feedback">
                    Mínimo 8 caracteres, con mayúsculas, minúsculas, números y un símbolo.
                </div>
            </div>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <label for="inputPasswordConfirm" class="form-label">Repetir Contraseña 
                <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                <input type="password" class="form-control" name="password_confirmation" 
                id="inputPasswordConfirm" required>
                <div class="invalid-feedback">Las contraseñas no coinciden.</div>
            </div>
        </div>
                            
                            
                            <div class="col-12 mt-4">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection