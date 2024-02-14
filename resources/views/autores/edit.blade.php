<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
</head>
<body>
    <h1>Edit Author</h1>

    <form method="POST" action="{{ route('autores.update', $autor->id) }}">
        @csrf
        @method('PUT')

        <label for="apellidos">Last Name:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="{{ $autor->apellidos }}"><br>

        <label for="nombre">First Name:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $autor->nombre }}"><br>

        <label for="sexo">Sex:</label><br>
        <input type="text" id="sexo" name="sexo" value="{{ $autor->sexo }}"><br>

        <label for="edad">Age:</label><br>
        <input type="text" id="edad" name="edad" value="{{ $autor->edad }}"><br>

        <label for="nacionalidad">Nationality:</label><br>
        <input type="text" id="nacionalidad" name="nacionalidad" value="{{ $autor->nacionalidad }}"><br>

        <button type="submit">Update Author</button>
    </form>
</body>
</html>
