@extends('layouts.layout') 

@section('content')


    <div id="carouselExampleFade" class="carousel slide carousel-fade mx-4" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Boda"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Buceo"></button>
            <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Kayac"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/servicios/boda.png') }}" class="d-block w-100 kenburns" alt="wedding planner">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h3 class="fw-bold">Wedding planner</h3>
                    <p>Haz realidad el día más importante de tu vida con nuestro servicio de wedding planner: cada rincón de la villa se transforma en el escenario perfecto para tu historia de amor.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/servicios/masaje.png') }}" class="d-block w-100 kenburns" alt="Masajes en la villa">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h3 class="fw-bold">Masajes en la villa</h3>
                    <p>Déjate envolver por la calma del Mediterráneo y renueva cuerpo y mente con nuestros masajes exclusivos.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/servicios/campana.png') }}" class="d-block w-100 kenburns" alt="Mayordomo privado">
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <h3 class="fw-bold">Mayordomo privado en la villa</h3>
                    <p>Disfruta de la exclusividad de un mayordomo privado que cuida cada detalle para que tu estancia sea perfecta.</p>
                </div>
            </div>
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    {{--TARJETAS --}}
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 mx-4 text-center">
    
        {{-- Aquí se usa @foreach para iterar sobre los datos recibidos del Controller --}}
        @foreach ($servicios as $servicio)
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    {{-- Se concatena la ruta donde están almacenadas las imagenes 'img/servicios/'.con el nombre del archivo de la base de datos--}}
<img src="{{ asset('img/servicios/' . $servicio->imagen) }}" class="card-img-top" alt="{{ $servicio->nomServExp }}">
                    
                    <div class="card-body d-flex flex-column">
                        {{-- Título y Descripción son dinámicos --}}
                        <h5 class="card-title">{{ $servicio->nomServExp }}</h5>
                        <p class="card-text">{{ $servicio->descripcion }}</p>
                        
           <div class="mt-auto mb-3">
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Precio por persona:</span>
            <span class="h5 fw-bold text-success mb-0">{{ number_format($servicio->precio, 2, ',', '.') }}€</span>
        </div>    
           </div>
                                   <div class="mt-auto">


           <!---*********************PARA RECOGER LA RESERVA******************************************************************---->
{{------------SI EL USUARIO ESTA LOGUEADO LE OFRECEMOS RESERVAR --------------------}}
@auth
           <form action="{{ route('reservas.store') }}" method="POST">
                        @csrf
                        {{-- Enviamos el ID del servicio oculto --}}
                        {{---Necesitamos saber el id del servicio por eso hidden---}}
            <input type="hidden" name="servicio_id" value="{{ $servicio->id_servExp }}">
                       
                    {{--Spinner solo se puede modificar mediante las flechas no por teclado--}}
                        <div class="mb-2">
<label class=" fw-bold text-secondary mb-1 d-block text-center">
        ¿Cuántos asistentes disfrutarán el servicio?
    </label>                          
      <input type="number" name="personas" class="form-control form-control-sm text-center" value="1" min="1" max="20" 
                             onkeydown="return false;" style="caret-color: transparent; cursor: default;"required>
                        </div>

                        {{-- El botón que envía los datos --}}
                        <button type="submit" class="btn btn-primary w-100">Reservar Ahora</button>
                    </form>
                    @else
                        {{-- SI EL USUARIO NO ESTÁ LOGUEADO: Botón que redirige al Login --}}
                        <div class="text-center">
                            <p class="small text-danger">Inicia sesión para reservar</p>
                            <!--
                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-sign-in-alt me-1"></i> Reservar
                            </a>
                            --->
                            <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
    <i class="fas fa-sign-in-alt me-1"></i> Reservar
</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endforeach
            </div>

{{-- FRASE  --}}

            <div class="card text-center mt-4 mx-4 custom-card">
  <div class="card-header">
    <strong> Haz tuya la villa: reserva servicios privados y exclusivos. </strong>
</div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><strong>“El lujo es una experiencia que te transforma.”</strong></p>
    </blockquote>
  </div>
</div>
    @endsection