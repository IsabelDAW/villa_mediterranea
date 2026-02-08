<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="villa mediterranea, reserva de servicios, alojamiento de lujo, vacaciones mediterraneo, 
    gestion de servicios turisticos, villas de lujo, aventuras, experiencias">
    <meta name="description" content="Reserva los mejores servicios exclusivos en Villa Mediterránea. Gestiona tus vacaciones de lujo con facilidad y seguridad.">

    <title>VILLA MEDITERRANEA</title>
    @vite(['resources/js/app.js'])

<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
            <link rel="stylesheet" href="{{ asset('estilosVilla.css') }}">
</head>

<body>
   

{{---Con sticky-top conseguimos que el nav se quede fijo durante toda la pagina----}}

<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">


    <div class="container d-flex justify-content-between align-items-center"> 
        <a href="{{ route ('home')}}">
                    <img src="{{ asset('img/favicon.PNG') }}" alt="Logo" width="50" height="auto" 
                    class="me-3 filter-white">
        </a>
        
        <div class="dropdown me-2 order-lg-last"> 
            <a class="user-icon" href="#" role="button" id="userMenu" 
            data-bs-toggle="dropdown" aria-expanded="false">           
                <i class="fas fa-user"></i> </a> 
       

                 
        <!-- NUEVO CODIGO QUE DIFERENCIA USUARIOS AUTENTIFICADOS Y LOS QUE NO -->


<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
    <!-- 1. ESTO LO VE EL INVITADO (Si NO ha iniciado sesión) guest lo enviara el navegador solo si es un usuario ánonimo -->
    @guest
        <li>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">
                Iniciar Sesión
            </a>
        </li>
    @endguest

    <!-- 2. ESTO LO VE EL USUARIO (Si SÍ ha iniciado sesión) gracias a auth -->
    @auth 
        @auth
<li class="dropdown-header border-bottom mb-2">
            <span class="text-dark-emphasis" > Panel privado de {{ Auth::user()->nombre }}</span>
        </li>
    <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-id-card me-2 text-muted"></i>Mi perfil</a></li>
    @endauth
            <li><hr class="dropdown-divider"></li>

           
    <!--RUTA PARA ACCEDER A VISUALIZAR RESERVAS--->
        <li><a class="dropdown-item" href="{{ route('reservas.index') }}"><i class="fas fa-concierge-bell"></i> Mis reservas</a></li>
        <li><hr class="dropdown-divider"></li>
        {{-- Redirigimos a la funcion logout para cerrar la sesion --}}
        <li><a class="dropdown-item logout-link" href="{{ route('logout') }}">Cerrar sesión</a></li>
    @endauth
</ul>

        <!-- ********hasta aquí el nuevo codigo -->
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-2">
         


    <a class="nav-link" href="{{ route('home') }}">La Villa</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('experiencias.index') }}">Experiencias</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a>
</li>


            </ul>
        </div>
        
    </div>
</nav>
@if(session('login_success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <div>
                {{ session('login_success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif



 @yield('content')

 {{-----------------------------FOOTER-----------------------------------}}
<footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ route('home')}}" class="text-decoration-none">
                <h5 class="text-primary fw-bold">Villa Mediterránea</h5>
                </a>
                <p class="text-muted">Hacemos realidad tus sueños más exclusivos en la costa mediterránea.</p>
            </div>

            <div class="col-md-4 mb-4 text-center">
                <h5 class="mb-3">Síguenos</h5>
                <div class="d-flex justify-content-center gap-3">
                    <a href="https://www.instagram.com/" target="_blank" class="text-white fs-4 social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" class="text-white fs-4 social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.linkedin.com/" target="_blank" class="text-white fs-4 social-icon">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4 mb-4 text-end">
                <h5>Contacto</h5>
                <ul class="list-unstyled text-muted">
                    <li><i class="fas fa-envelope me-2"></i> 
                        <a href=mailto:villamediterranea.luxury@gmail.com class="text-decoration-none">info@villamediterranea.com</a></li>
                    <li><i class="fas fa-phone me-2"></i> +34 600 000 000</li>
                </ul>
            </div>
        </div>
        <hr class="bg-secondary">
        <div class="text-center text-muted small">
            © {{ date('Y') }} Luxury Experiences. Todos los derechos reservados.
        </div>
    </div>
</footer>


<!-- MODAL DE INICIO DE SESION -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Mensaje de éxito tras registro --}}
                @if(session('success'))
                    <div class="alert alert-info py-2" style="font-size: 0.9rem;">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif

                {{--Para ver si hay errores en el login--}}
                @if($errors->any())
                {{--"alert alert-danger -> clases de Bootstrap. Dibujan una caja roja, para indicar errores o peligro--}}
    <div class="alert alert-danger py-2" style="font-size: 0.8rem;">
        {{--Muestra un círculo con un signo de exclamación para que el usuario identifique el error visualmente de un vistazo.--}}
        <i class="fas fa-exclamation-circle me-2"></i>
        {{-- Mostramos el primer error que encuentre --}}
        {{ $errors->first() }}
    </div>
@endif

                {{-- Formulario de Login --}}
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Dirección de Correo Electrónico</label>
                        {{-- name="email" para que Laravel lo reciba --}}   {{--si el usuario se equivoca en la contraseña, el email se quedará escrito para que no tenga que ponerlo otra vez.--}}
                        <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        {{-- name="password" para que Laravel lo reciba --}}
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <p class="mb-0 me-2">¿No tienes cuenta?</p>
                <a href="{{ route('register') }}" class="link-primary fw-bold text-decoration-none">Regístrate aquí</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
</script>
{{-- Script para abrir el modal automáticamente si hay un mensaje de éxito --}}
{{--@if(session('success'))--}}
@if(session('abrir_modal'))
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Creamos una instancia del modal de Bootstrap usando su ID
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
            // Lo mostramos automáticamente
            myModal.show();
        });
        
    </script>
@endif

</body>
</html>