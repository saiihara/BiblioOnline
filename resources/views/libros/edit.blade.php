<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    <form method="POST" action="{{ route('libros.update', $libro->id) }}">
        @csrf
        @method('PUT')

        <label for="titulo">Title:</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}"><br>

        <label for="categoria">Category:</label><br>
        <input type="text" id="categoria" name="categoria" value="{{ $libro->categoria }}"><br>

        <label for="autor_id">Author:</label><br>
        <select name="autor_id" id="autor_id">
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}" {{ $libro->autor_id == $autor->id ? 'selected' : '' }}>{{ $autor->nombre }} {{ $autor->apellidos }}</option>
            @endforeach
        </select><br>


        <label for="descripcion">Description:</label><br>
        <textarea id="descripcion" name="descripcion">{{ $libro->descripcion }}</textarea><br>

        <label for="precio">Price:</label><br>
        <input type="text" id="precio" name="precio" value="{{ $libro->precio }}"><br>

        <button type="submit">Update Book</button>
    </form>
</body>
</html>
