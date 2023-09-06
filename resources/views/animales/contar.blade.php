@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Conteo de Animales</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($resultados as $resultado)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $resultado->TipoAnimal }}</h5>
                        <p class="card-text"><strong>Cantidad:</strong> {{ $resultado->cantidad }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
