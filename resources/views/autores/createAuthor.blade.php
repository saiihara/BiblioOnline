<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Añadir autores</h1>
<form action="{{ route('autores.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="apellidos">Apellidos:</label><br>
    <input type="text" id="apellidos" name="apellidos"><br>
    <label for="nacionalidad">Nacionalidad:</label><br>
    <input type="text" id="nacionalidad" name="nacionalidad"><br>
    <label for="sexo">Sexo:</label><br>
    <input type="text" id="sexo" name="sexo"><br>
    <label for="edad">Edad:</label><br>
    <input type="text" id="edad" name="edad"><br>
    <input type="submit" value="Añadir Autor">
</form>

</body>
</html>