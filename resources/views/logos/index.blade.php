<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/logoIndex.css') }}">
    <title>LOGOS</title>
</head>
<body>

@if(session('success'))
    <div id="alert" class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div id="alert" class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container">
    <h2 class="mt-4">LOGOS</h2>
    <a href="/marcas" class="btn btn-primary mb-2">VOLVER</a>

    <form action="/logos" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="icon">Subir icono (PNG solamente)</label>
            <input type="file" class="form-control-file" logo="logo" name="name" accept=".png" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>

    <div class="row">
        @foreach($logos as $logo)
            <div class="col-md-4 mb-3">
                <div class="card">
                <img src="{{ asset('storage/uploads/'.$logo->name) }}" alt="{{ $logo->name }}" class="card-img-top" style="width: 200px; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $logo->name }}</h5>
                        <form action="/logos/{{ $logo->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('logos.edit', $logo) }}" type="submit" class="btn btn-warning">Cambiar nombre</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
