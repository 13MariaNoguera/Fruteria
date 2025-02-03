@extends('layouts.template')

@section('title', 'Frutería Noguera')
@section('header', 'Frutería Noguera')

@section('content')

    <div class="login">
        @if(!auth()->check())
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Iniciar Sesión</a>
        @endif

        @if(auth()->check())
            <div class="logoutBtn">
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
                </form>
            </div>
        @endif
    </div>

    <div class="contenedorTabla">
        @if(auth()->check())
            <p class="bienvenida">Bienvenido/a {{ auth()->user()->username }}</p>
        @endif
        <table class="table text-center table-bordered table-striped m-5">
            <thead>
                <tr class="fw-bold">
                    <td>Id</td>
                    <td>Imagen</td>
                    <td>Nombre</td>
                    <td>Temporada</td>
                    <td>Precio</td>
                    <td>Stock</td>
                    @if(auth()->check())
                    <td>Acción</td>
                    @endif
                </tr>
            </thead>
            
            @foreach($fruta as $frutas)
            <tr>
                <td>{{ $frutas->id }}</td>
                <td><img class="img" src="{{ $frutas->imagen }}" alt="{{ $frutas->nombre }}"></td>
                <td>{{ $frutas->nombre }}</td>
                <td>{{ $frutas->temporada }}</td>
                <td>{{ $frutas->precio }} €</td>
                <td>{{ $frutas->stock }}</td>
                @if(auth()->check())
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <a class="btn btn-outline-warning btn-sm" href="{{ route('fruteria.show', ['id' => $frutas->id]) }}">Vista</a>
                            <a class="btn btn-outline-success btn-sm" href="{{ route('fruteria.edit', ['id' => $frutas->id]) }}">Editar</a>
                            <form action="{{ route('fruteria.delete', ['id' => $frutas->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta fruta?');">Eliminar</button>
                            </form>
                        </div>
                    </td>
                @endif
            </tr>
            @endforeach
        </table>
        @if(auth()->check())
        <a href="{{ route('fruteria.create')}}" class="btn btn-outline-info">Añadir Fruta</a>
        @endif
    </div>

@endsection