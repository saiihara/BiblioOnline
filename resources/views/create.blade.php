<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>Crear</h1>

    <form action="{{ route('libros.store') }}" method="POST">
    @csrf
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="categoria">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria"><br>
    <label for="autor_id">ID del Autor:</label><br>
    <input type="text" id="autor_id" name="autor_id"><br>
    <label for="descripcion">Descripción:</label><br>
    <input type="text" id="descripcion" name="descripcion"><br>
    <label for="precio">Precio:</label><br>
    <input type="text" id="precio" name="precio"><br>
    <input type="submit" value="Añadir Libro">
</form>


</body>
</html>