@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Tipos de Animales</h1>
            <a href="{{ route('tipo_animales.create') }}" class="btn btn-primary mb-3">Agregar Tipo de Animal</a>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($tipoAnimales as $tipoAnimal)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $tipoAnimal->nombre }}</h5>
                        <form action="{{ route('tipo_animales.destroy', $tipoAnimal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de animal?')">Eliminar</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
