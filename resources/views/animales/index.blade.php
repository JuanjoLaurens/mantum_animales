@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Animales</h1>
            <a href="{{ route('animales.create') }}" class="btn btn-primary mb-3">Agregar Animal</a>
            <a href="{{ route('animales.contar') }}" class="btn btn-primary mb-3">Conteo animales</a>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($animales as $animal)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $animal->nombre }}</h5>
                        <p class="card-text"><strong>Tipo:</strong> {{ $animal->tipoAnimal->nombre }}</p>
                        <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $animal->fecha_nacimiento }}</p>
                        <form action="{{ route('animales.destroy', $animal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-right" onclick="return confirm('¿Estás seguro de que deseas eliminar este animal?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
