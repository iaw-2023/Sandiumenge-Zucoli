<!DOCTYPE html>
<html>
<head>
    <title>Logos</title>
</head>
<body>

<h2>Logos</h2>

@if(session('success'))
    <div id="alert" class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div id="alert" class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="/logos" method="post" enctype="multipart/form-data">
    @csrf
    <label for="logo">Seleccionar imagen:</label>
    <input type="file" name="logo" id="logo">
    <button type="submit">Subir imagen</button>
</form>

<ul>
    @foreach($logos as $logo)
        <li>
            <img src="{{ asset('uploads/'.$logo->name) }}" alt="{{ $logo->name }}" style="width: 100px;">
        </li>
    @endforeach
</ul>

</body>
</html>
