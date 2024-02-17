@extends('layouts.plantillabase')
<title>DreamCar | Crear</title>
@section('contenido')
<h2>CREAR REGISTRO</h2>

<form action="/reservasDetalle" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">ID RESERVA</label>
        <select id="id_reserva" name="id_reserva" class="form-control" tabindex="3">
            @foreach($idReservaSinDetalle as $idReserva)
                <option value="{{ $idReserva }}">{{ $idReserva }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_vehiculo" class="form-label">VEHICULO</label>
        <select id="id_vehiculo" name="id_vehiculo" class="form-control" tabindex="3">
            @foreach($vehiculosDisponibles as $vehiculo)
                <option value="{{ $vehiculo->id }}">{{ $vehiculo->marca->marca }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">PRECIO</label>
        <input id="precio" name="precio" type="number" class="form-control" tabindex="2">
    </div>
    <div>
        <a href="/reservasDetalle" class="btn btn-secondary" tabindex="5">CANCELAR</a>
        <button type="submit" class="btn btn-primary" tabindex="6">GUARDAR</button>
    </div>
</form>