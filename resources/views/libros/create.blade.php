<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Añadir libro</h2>
<form action="{{ route('libros.store') }}" method="POST">
    @csrf
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="categoria">Categoría:</label><br>
    <input type="text" id="categoria" name="categoria"><br>
    <label for="autor_id">Autor:</label><br>
    <select name="autor_id" id="autor_id">
        @foreach($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellidos }}</option>
        @endforeach
    </select><br>
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion"></textarea>
    <label for="precio">Precio:</label><br>
    <input type="text" id="precio" name="precio"><br>
    <input type="submit" value="Añadir Libro">
</form>

</body>
</html>