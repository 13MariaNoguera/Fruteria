@extends('layouts.template')

@section('title', 'Frutería Noguera')
@section('header', 'Añadir Fruta')

@section('content')

    <form class="formulario" action="{{ route('fruteria.store')}}" method="POST">  
        @csrf      
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="titulo">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Introduzca el nombre" required>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="autor">Temporada</label>
                <select name="temporada" class="form-control" required>
                    <option>Invierno</option>
                    <option>Primavera</option>
                    <option>Verano</option>
                    <option>Otoño</option>
                </select>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" class="form-control" placeholder="Introduzca el precio" step="0.01" min="0" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="precio">Stock</label>
                    <input type="number" name="stock" class="form-control" placeholder="Introduzca el stock" step="0.01" min="0" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="text" name="imagen" class="form-control" placeholder="Introduzca el link de la imagen" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center gap-2">
            <button type="submit" class="btn btn-outline-success">Añadir Fruta</button>
            <a href="{{ route('fruteria.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>

@endsection