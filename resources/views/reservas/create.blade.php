@extends('layouts.plantillabase')
<title>DreamCar | Crear</title>
@section('contenido')
<h2>CREAR REGISTRO</h2>

<form action="/reservas" method="POST">
    @csrf <!-- directiva para el submit que nos crea un token oculto-->
    <div class="mb-3">
        <label for="" class="form-label">ID</label>
        <input id="id" name="id" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">EMAIL</label>
        <input id="email" name="email" type="text" class="form-control" tabindex="2">
    </div>
    
    <div>
        <a href="/reservas" class="btn btn-secondary" tabindex="3">CANCELAR</a>
        <button type="submit" class="btn btn-primary" tabindex="4">GUARDAR</button>
    </div>
</form>