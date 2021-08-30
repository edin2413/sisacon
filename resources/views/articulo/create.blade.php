@extends('adminlte::page')

@section('title', 'Crear Articulo')

@section('content_header')
    <h1>Crear registros</h1>
@stop

@section('content')

<h2>CREAR REGISTROS</h2>
<form action="/articulos" method="POST">

    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" tabindex="4">
    </div>
    
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop