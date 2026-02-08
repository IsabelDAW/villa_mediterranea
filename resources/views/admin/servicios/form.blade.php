@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">
                        {{ isset($elemento) ? 'Modificar Elemento' : 'Crear Nuevo Servicio/Experiencia' }}
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.servicios.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        {{-- Campo oculto para el ID si estamos editando --}}
                        @if(isset($elemento))
                            <input type="hidden" name="id_servExp" value="{{ $elemento->id_servExp }}">
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Servicio o Experiencia</label>
                            <input type="text" name="nomServExp" class="form-control" 
                                   value="{{ $elemento->nomServExp ?? old('nomServExp') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tipo de Categoría</label>
                            <select name="tipo" class="form-select" required>
                                <option value="" disabled {{ !isset($elemento) ? 'selected' : '' }}>Selecciona una opción...</option>
                                <option value="s" {{ (isset($elemento) && $elemento->tipo == 's') ? 'selected' : '' }}>Servicio (s)</option>
                                <option value="e" {{ (isset($elemento) && $elemento->tipo == 'e') ? 'selected' : '' }}>Experiencia (e)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del archivo de imagen</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                <input type="file" name="imagen" class="form-control" accept="image/*"
                                       placeholder="ejemplo: yate.png" 
                                       value="{{ $elemento->imagen ?? old('imagen') }}">
                            </div>
                            <small class="text-muted">Por favor, selecciona un archivo.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="4">{{ $elemento->descripcion ?? old('descripcion') }}</textarea>
                        </div>

                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Precio</label>
                            <input name="precio" class="form-control" rows="4" value= "{{ $elemento->precio ?? old('precio') }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.servicios.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-save"></i> {{ isset($elemento) ? 'Guardar Cambios' : 'Crear Elemento' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection