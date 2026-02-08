
@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-uppercase" style="font-size: 1.5rem;">
            <i class="fas fa-key text-warning me-2"></i> Gestión Global de Reservas
        </h2>
        <a href="{{ route('perfil') }}" class="btn btn-dark">Volver</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="ps-4">Cliente</th>
                        <th>Experiencia</th>
                        <th>Fecha y Hora</th>
                        <th>Personas</th>
                        <th>Total</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservas as $reserva)
                    <tr>
                        <td class="ps-4">
                            <strong>{{ $reserva->user->nombre }}</strong><br>
                            <small class="text-muted">{{ $reserva->user->email }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $reserva->detalles->first()->servicio->nomServExp ?? 'N/A' }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y H:i') }}</td>
                        <td class="text-center">{{ $reserva->n_personas }}</td>
                        <td class="fw-bold">{{ number_format($reserva->precio, 2) }}€</td>
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


                            <form action="{{ route('admin.reservas.destroy', $reserva->id_reserva) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

             
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
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
@endsection