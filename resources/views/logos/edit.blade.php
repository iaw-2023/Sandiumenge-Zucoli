@extends('layouts.plantillabase')
<title>DreamCar | Editar</title>

@section('contenido')
    <div class="container">
        <h1>Editar Logo</h1>
        <br></br>
        <a href="/logos" class="btn btn-primary mb-2">VOLVER</a>
        <form action="{{ route('logos.update', $logo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre del Logo</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $logo->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <br></br>
            
            <div class="card-body">
                <h5 class="card-title">{{ $logo->name }}</h5>
                <img src="{{ asset('uploads/'.$logo->name) }}" alt="{{ $logo->name }}" class="card-img-top" style="width: 200px; height: auto;">
                <form action="/logos/{{ $logo->id }}" method="POST">
            </div>

        </form>
    </div>
@endsection