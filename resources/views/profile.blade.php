<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    <!-- Crie input para edição dos campos -->
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <label for="avatar_url">Avatar</label>
        <input type="text" name="avatar_url" value="{{ $user->avatar_url }}">
        <br>
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ $user->name }}">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ $user->email }}">
        <br>
        <label for="biography">Biografia</label>
        <input type="text" name="biography" value="{{ $user->biography }}">
        <br>
        <label for="nickname">Apelido</label>
        <input type="text" name="nickname" value="{{ $user->nickname }}">
        <br>
        <label for="genre">Gênero</label>
        <input type="text" name="genre" value="{{ $user->genre }}">
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>
