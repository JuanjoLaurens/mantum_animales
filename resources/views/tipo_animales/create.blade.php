@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Crear Tipo de Animal</h1>
            <form method="POST" action="{{ route('tipo_animales.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del Tipo de Animal:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe el nombre del tipo de animal" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('tipo_animales.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
