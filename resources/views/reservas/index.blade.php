@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white p-4 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Mis Experiencias en la Villa</h3>
            <span class="badge bg-gold" style="background-color: #b89550;">{{ count($reservas) }} Reservas</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Fecha</th>
                            <th>Servicio / Experiencia</th>
                            <th>Personas</th>
                            <th>Total</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservas as $reserva)
                            <tr>
                                <td class="ps-4">
                                    <strong>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</strong>
                                </td>
                                <td>
                                    @foreach($reserva->detalles as $detalle)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            {{ $detalle->servicio->nomServExp }}
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ $reserva->n_personas }} pers.</td>
                                <td class="fw-bold">{{ $reserva->precio }}€</td> 
                                <td class="text-center">

<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmarBorrado">
  Cancelar
</button>

<div class="modal fade" id="confirmarBorrado" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-center">
      <div class="modal-header justify-content-center">
        <h5 class="modal-title bg-dark text-white text-center w-100" class=text-center>Confirmar Cancelación</h5>
      </div>

      <div class="modal-body bg-light" >
        ¿Estás seguro de que deseas cancelar la reserva en Villa Mediterránea?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>

    <form action="{{ route('reserva.destroy', $reserva->id_reserva) }}" method="POST">
        @csrf
        @method('DELETE') <!-- Laravel cuando recibe el formulario y ve este metodo directamente 
            busca la ruta delete y ejecuta la funcion que se encuentra en el controlador.-->
            <button type="submit" class="btn btn-danger">Sí, cancelo</button>
        
       
    </form>
                              
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-calendar-times display-4 d-block mb-3"></i>
                                    Aún no has realizado ninguna reserva.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('perfil') }}" class="btn btn-dark text-white text-decoration-none">
            <i class="fas fa-arrow-left me-2"></i> Volver a mi Perfil
        </a>
    </div>
</div>
@endsection