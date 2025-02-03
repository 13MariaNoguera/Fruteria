@extends('layouts.template')

@section('title', 'Editar Fruta')

@section('header')
    @foreach($fruta as $frutas)    
        <h1>Editando "{{ $frutas->nombre }}"</h1>
    @endforeach
@endsection

@section('content')

<form class="formulario" action="{{ route('fruteria.update', ['id' => $frutas->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="titulo">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $frutas->nombre }}" placeholder="Introduzca el nombre" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="autor">Temporada</label>
                <select name="temporada" class="form-control" required>
                    <option value="Invierno" {{ old('temporada', $frutas->temporada) == 'Invierno' ? 'selected' : '' }}>Invierno</option>
                    <option value="Primavera" {{ old('temporada', $frutas->temporada) == 'Primavera' ? 'selected' : '' }}>Primavera</option>
                    <option value="Verano" {{ old('temporada', $frutas->temporada) == 'Verano' ? 'selected' : '' }}>Verano</option>
                    <option value="Otoño" {{ old('temporada', $frutas->temporada) == 'Otoño' ? 'selected' : '' }}>Otoño</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" class="form-control" value="{{ $frutas->precio }}" placeholder="Introduzca el precio" step="0.01" min="0" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="precio">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $frutas->stock }}" placeholder="Introduzca el stock" step="0.01" min="0" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="text" name="imagen" class="form-control" value="{{ $frutas->imagen }}" placeholder="Introduzca el link de la imagen" required>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-2">
        <button type="submit" class="btn btn-outline-success">Guardar Cambios</button>
        <a href="{{ route('fruteria.index') }}" class="btn btn-outline-danger">Cancelar</a>
    </div>
</form>

@endsection
