@extends('layouts.layout') 

@section('content')



<!--CARRUSEL -->

<div id="carouselExampleFade" class="carousel slide carousel-fade mx-4" data-bs-ride="carousel" data-bs-interval="3000">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" 
    aria-current="true" aria-label="Wakeboard"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Buceo"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Kayac"></button>
  </div>

  <!-- Slides -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="img/experiencias/wakeboard.PNG" class="d-block w-100 kenburns" alt="wakeboard por el mar Mediterráneo">
    <div class="carousel-caption d-flex flex-column justify-content-center h-100">
      <h3 class="fw-bold">Wake board</h3>
      <p>Deslizate por el mar con estilo.</p>
    </div>
  </div>

  <div class="carousel-item">
    <img src="img/experiencias/BUCEO.PNG" class="d-block w-100 kenburns" alt="Buceo en el Mediterráneo">
    <div class="carousel-caption d-flex flex-column justify-content-center h-100">
      <h3 class="fw-bold">Inmersión Mediterránea</h3>
      <p>Sumérgete en aguas cristalinas y descubre un mundo oculto.</p>
    </div>
  </div>

  <div class="carousel-item">
    <img src="img/experiencias/kayac.PNG" class="d-block w-100 kenburns" alt="Kayac en la costa">
    <div class="carousel-caption d-flex flex-column justify-content-center h-100">
      <h3 class="fw-bold">Aventura en Kayak</h3>
      <p>Surca la costa y siente la libertad del mar.</p>
    </div>
  </div>
</div>


  <!-- Controles -->
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
        @foreach ($experiencias as $experiencia)
            <div class="col">
                <div class="card h-100 d-flex flex-column">
                    {{-- Se concatena la ruta donde están almacenadas las imagenes 'img/servicios/'
                   .con el nombre del archivo de la base de datos--}}
            <img src="{{ asset('img/experiencias/' . $experiencia->imagen) }}"

 class="card-img-top" alt="{{ $experiencia->nomServExp }}">
                    
                    <div class="card-body d-flex flex-column">
                        {{-- Título y Descripción son dinámicos --}}
                        <h5 class="card-title">{{ $experiencia->nomServExp }}</h5>
                        <p class="card-text">{{ $experiencia->descripcion }}</p>
                        <div class="mt-auto mb-3">
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted">Precio por persona:</span>
            <span class="h5 fw-bold text-success mb-0">{{ number_format($experiencia->precio, 2, ',', '.') }}€</span>
        </div>
    </div>
                        
                        <div class="mt-auto">
                          <!--****PARA RECOGER LA RESERVA ************----->
              {{------------SI EL USUARIO ESTA LOGUEADO LE OFRECEMOS RESERVAR --------------------}}
@auth
 <form action="{{ route('reservas.store') }}" method="POST">
    @csrf
    <input type="hidden" name="servicio_id" value="{{ $experiencia->id_servExp }}">
      {{--Spinner solo se puede modificar mediante las flechas no por teclado--}}
                        <div class="mb-2">
<label class=" fw-bold text-secondary mb-1 d-block text-center">
        ¿Cuántos asistentes disfrutarán la experiencia?
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
                            <!---
                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-sign-in-alt me-1"></i> Reservar
                            </a>
                            --->
                            <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                          <i class="fas fa-sign-in-alt me-1"></i> Iniciar sesión
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
    <strong>“No sigas caminos trazados, crea tu propio sendero.”</strong>
</div>

</div>
    @endsection