@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Agregar Animal</h1>
            <form method="POST" action="{{ route('animales.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre del Animal:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del animal" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo_id">Tipo de Animal:</label>
                            <select class="form-control" id="tipo_id" name="tipo_id" required>
                                <option value="">Seleccione</option>
                                @foreach($tiposAnimales as $tipoAnimal)
                                    <option value="{{ $tipoAnimal->id }}">{{ $tipoAnimal->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('animales.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
