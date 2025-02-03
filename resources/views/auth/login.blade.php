@extends('layouts.template')

@section('title', 'Frutería Noguera')
@section('header', 'Login | Frutería Noguera')

@section('content')

    <div class="loginContainer">
        @if (!empty($error))
            <div class="text-danger d-flex justify-content-center align-items-center">{{ $error }}</div>
        @endif

        <form class="loginForm" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="col-md-12">
                    
                <div class="form-group">
                    <label class="mb-1" for="username">Usuario:</label>
                    <input type="text" placeholder="Introduce tu usuario" class="form-control" name="username" id="username" required/>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="mb-1" for="password">Contraseña:</label>
                    <input type="password" placeholder="Introduce tu contraseña" class="form-control" name="password" id="password" required/>
                </div>
            </div>
            <input type="submit" name="enviar" value="Entrar" class="btn btn-primary btn-block">
        </form>

        <a href="{{ route('fruteria.index') }}">Ver la frutería sin usuario existente</a>
    </div>

@endsection