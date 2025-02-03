@extends('layouts.template')

@section('title', 'Frutería Noguera')
@section('header', "Visualizando Fruta")

@section('content')


    <div class="contenedorShow">
        <div class="frutaContainer">
            @foreach($fruta as $frutas)
                <div class="fondoImagen">
                    <img class="imgFruta" src="{{ $frutas->imagen }}" alt="$frutas->nombre">
                </div>
                <div class="descripcionFruta">
                    <h3>{{ $frutas->nombre }}</h3>
                    <div class="descripcion">
                        <p>Esta fruta es de la temporada de {{ $frutas->temporada }}</p>
                        <p>Cantidad disponible: {{ $frutas->stock }}</p>
                        <a class="btn btn-outline-danger">{{ $frutas->precio }} €</a>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('fruteria.index') }}" class="btn btn-primary">Volver Atrás</a>
    </div>
    
@endsection