@extends('layouts.plantillabase')

<title>DreamCar | Marcas</title>
@section('contenido')
<a href="/home" class="btn btn-primary">HOME</a>
<a href="marcas/create" class="btn btn-primary">AGREGAR MARCA</a>

<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">MARCA</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($marcas as $marca)
        <tr>
            <td>{{ $marca->id }}</td>
            <td>{{ $marca->marca }}</td>
            <td>
                <form action="{{ route('marcas.destroy',$marca->id) }}" method='POST'>
                    <a href="/marcas/{{ $marca->id }}/edit" class="btn btn-info">EDITAR</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">BORRAR</button>
                <form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection