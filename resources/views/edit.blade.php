<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!--Mostrar usuario -->
    <h1>Editar usuario</h1>
    <form action="{{ route('update.user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ $user->name }}">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
        <br>
     
        <br>
        <button type="submit">Actualizar</button>
    
</body>
</html>