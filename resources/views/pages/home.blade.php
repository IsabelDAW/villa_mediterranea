@extends('layouts.layout') 

@section('content')

<div class="container white text-center pt-5">
    <h1>VILLA MEDITERRANEA</h1>
    <p>El placer de unas vacaciones</p>
</div>

<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/carrusel/villaPlaya.jpg')}}" class="d-block w-100" alt="Villa en la playa">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/carrusel/cocina.jpg')}}" class="d-block w-100" alt="Cocina de la villa">
            </div>
            <div class="carousel-item">
                <img src="{{ asset ('img/carrusel/piscina.PNG')}}" class="d-block w-100" alt="Piscina de la villa">
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="bg-white pt-5 pb-5">
                <h2 class="text-center">Un cuento de hadas flotando sobre el mar Mediterráneo</h2>
                <h3 class="gray text-center">Disfruta de unas inolvidables vacaciones de lujo.</h3>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                    La villa
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                 aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Villa Mediterránea</h5>
                            <p class="card-text"><strong>Ubicada a solo 10 minutos de la cosmopolita ciudad de Dénia,</strong>
                                esta asombrosa casa disfruta con impresionantes vistas de los mágicos colores del
                                atardecer. Increíbles vistas al mar desde todas las habitaciones. A 50 pasos de la playa. Diario
                                despertar con cantar de pajaros. 3 piscinas y 2 jacuzzis.</p>
                        </div>
                        <div class="container bg-white">
                            <div class="row">
                                <div class="col-md-6"><img class="img-fluid" src="{{asset ('/img/VillaIndex/frontal.jpg')}}" alt="Vista frontal de la villa"></div>
                                <div class="col-md-6"><img class="img-fluid" src="{{asset ('img/VillaIndex/piscina.jpg')}}" alt="Piscina exterior"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Villa Mediterránea Luxury</h5>
                            <p class="card-text"><strong>Uno de los alquileres más lujosos y privados en Dénia, Comunidad Valenciana.</strong>
                                Cada suite es de 30 a 45 metros cuadrados, baño privado con jacuzzi, televisión por satélite, disponible wi-fi.
                                Tendrás toda la casa para ti y la compartirás solo con las personas que viajen contigo.</p>
                        </div>
                        <div class="container bg-white">
                            <div class="row">
                                <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/VillaIndex/jacuzzy.jpg')}}" alt="Jacuzzi interior"></div>
                                <div class="col-md-6"><img class="img-fluid" src="{{ asset('img/VillaIndex/habitacion.jpg')}}" alt="Habitación de lujo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                Las Estancias
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Amplio salon comedor</h5>
                        <p class="card-text"> <strong> El Horizonte como Escenario </strong>
                           Disfrute de la inmensidad del Mediterráneo desde un salón diseñado para fundirse con el mar. Un espacio diáfano donde la luz natural y el mobiliario de diseño crean la atmósfera perfecta para cenas inolvidables frente a la costa Mediterránea.</p>
                    </div>
                    <div class="container bg-white">
                        <div class="row">
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/PlayaIndex/sala.png')}}" alt="Buceo en Cala Llebeig"></div>
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/PlayaIndex/comedor.png')}}" alt="Columpios en la playa"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">La Cocina y La Bodega</h5>
                        <p class="card-text"> 
                            <strong>Nuestra cocina </strong> autor es el escenario perfecto para
                             que chefs privados conviertan ingredientes locales en banquetes inolvidables, todo dentro de la serenidad de su hogar. 
                            Un espacio donde el diseño minimalista se encuentra con la funcionalidad profesional. 
                           <strong> Nuestra bodega </strong>alberga una selección curada de las mejores etiquetas del mundo, lista para elevar cada brindis bajo una iluminación arquitectónica única."</p>
                    </div>
                    <div class="container bg-white">
                        <div class="row">
                            <div class="col-md-6 pt-2"><img class="img-fluid" src="{{ asset ('img/carrusel/cocina.jpg')}}" alt="Equipo de buceo"></div>
                            <div class="col-md-6 pt-2"><img class="img-fluid" src="{{ asset ('img/PlayaIndex/bodega.png')}}" alt="Paseo por la playa"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                La Exclusividad
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
             aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Hecho a medida</h5>
                        <p class="card-text"><strong>En Villa Mediterránea encontraras cosas sorprendentes</strong>
                            No creemos en los servicios estándar; creemos en experiencias creadas 
                            exclusivamente para usted, adaptadas a su estilo de vida y preferencias personales. Desde la selección de su vino 
                            favorito hasta la organización de eventos privados, cada detalle se coordina para superar sus expectativas más exigentes.
                        Transformamos su estancia en un refugio de confort total, donde nuestro equipo anticipa cada una de sus necesidades antes incluso de que surjan</p>
                    </div>
                    <div class="container bg-white">
                        <div class="row">
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/PlayaIndex/chofer.png')}}" alt="Vista de la ciudad"></div>
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/servicios/Lavanderia.png')}}" alt="Playa de Dénia"></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Más allá de la Villa</h5>
                        <p class="card-text"><strong>“Si a Dénia vas, sé ben cert que hi tornaràs”</strong>
                            Más que un simple viaje, le ofrecemos una inmersión absoluta en el privilegio,
                             donde cada experiencia está hilada con la elegancia y el confort de su propia villa. Acceda a lo inalcanzable: desde catas 
                             privadas en bodegas históricas hasta travesías en yate al atardecer, cada momento es una invitación a lo extraordinario. </p>
                    </div>
                    <div class="container bg-white">
                        <div class="row">
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/experiencias/acantilados.PNG')}}" alt="Castillo de Dénia"></div>
                            <div class="col-md-6"><img class="img-fluid" src="{{ asset ('img/experiencias/moto.PNG')}}" alt="Vista del puerto de Dénia"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-4 mx-4">
    <div class="col-md-6">
        <div class="card mb-3" >
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset ('img/ExperIndex/tortuga.jpg')}}" class="img-fluid rounded-start" alt="Buceando con tortugas">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-body text-center text-center d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Siente la naturaleza en estado puro</h5>
                        <p class="card-text">Las tortugas marinas son unos de los animales más adorables que viven en nuestros mares. 
                            Te hará feliz avistarlas y nadar con ellas. ¡Vive la experiencia!</p>
                    <a href="{{ route('experiencias.index') }}" class="btn btn-outline-dark">Experiencias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset ('img/ExperIndex/barco.jpg')}}" class="img-fluid rounded-start" alt="Paseo en barco">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-body text-center text-center d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Celebra con amigos y familiares</h5>
                        <p class="card-text">Únete a nuestro tour y descubre esta villa de pescadores. Una experiencia que te cautivará 
                            para siempre y de la que no podrás olvidarte. </p>
                    <a href="{{ route('experiencias.index') }}" class="btn btn-outline-dark">Experiencias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mx-4">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset ('img/ServIndex/Mayordomo.PNG')}}" class="img-fluid rounded-start" alt="Mayordomo">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-body text-center text-center d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Mayordomo privado</h5>
                        <p class="card-text">El arte de vivir sin preocupaciones. Servicio de mayordomo que convierte cada momento en lujo absoluto,
                            deja que se ocupen de ti </p>
                    <a href="{{ route('servicios.index') }}" class="btn btn-outline-dark">Servicios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset ('img/ServIndex/chef.PNG')}}" class="img-fluid rounded-start" alt="Chef privado">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                        <h5 class="card-title">Tu villa, tu chef</h5>
                        <p class="card-text">Deléitate con la alta cocina mediterránea en la intimidad de tu villa, con un chef privado dedicado a transformar cada comida en una experiencia inolvidable.</p>
                    <a href="{{ route('servicios.index') }}" class="btn btn-outline-dark">Servicios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white mt-4">
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('contacto.enviar') }}" method="POST" class="row g-3 needs-validation pt-5 pb-5" novalidate>
       @csrf
        <label class="text-center">Rellena el formulario y nos pondremos en contacto contigo, estamos a tu disposición</label>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="validationCustom01" placeholder="name" value="{{ old('apellidos') }}" required 
               pattern="^[a-zA-ZÀ-ÿ\s']+$"><div class="invalid-feedback">El nombre es oligatorio</div>
                                @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
            <div class="valid-feedback">
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="validationCustom02" placeholder="last name" value="{{ old('apellidos') }}" required 
               pattern="^[a-zA-ZÀ-ÿ\s']+$"><div class="invalid-feedback">El apellido es oligatorio</div>
                                @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" name="email" class="form-control" id="validationCustomUsername"
                       aria-describedby="inputGroupPrepend" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" id="validationCustom03" placeholder="Valencia" value="{{ old('apellidos') }}" required 
               pattern="^[a-zA-ZÀ-ÿ\s']+$"><div class="invalid-feedback">La ciudad es oligatoria</div>
                                @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">País</label>
            <select class="form-select" name="pais" id="validationCustom04" required>
                <option selected disabled value="">Selecciona...</option>
           <option value="España">España</option>
            <option value="Francia">Francia</option>
            <option value="Portugal">Portugal</option>
            <option value="Italia">Italia</option>
            <option value="Alemania">Alemania</option>
            <option value="Rusia">Rusia</option>
            <option value="Inglaterra">Inglaterra</option>
            </select>
        </div>
        <div class="col-md-3">
                         <label for="inputTelefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                <input type="tel" name="telefono" class="form-control" id="inputTelefono" 
                       value="{{ old('telefono') }}" required 
                       pattern="^(\+[0-9]{1,4})?[0-9]{9}$">
                <div class="invalid-feedback">Introduce un teléfono válido (ej: +34 600000000).</div>
            </div>
        </div>
        <div class="col-12">
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary rounded-pill px-5" type="submit">ENVIAR FORMULARIO</button>
        </div>
    </form>
</div>
</div>
 @endsection