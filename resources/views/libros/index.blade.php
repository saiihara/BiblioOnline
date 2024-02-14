<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Libros</h1>
<a href="{{ route('libros.create') }}" class="">Add new book</a>

@if ($libros->isEmpty())
    <p>This is weird... There are no books here! Start adding books</p>
@else
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Categoría</th>
            <th>Autor</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>

        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->categoria}}</td>
                <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellidos }}</td>
                <td>{{ $libro->descripcion }}</td>
                <td>{{ $libro->precio }}</td>
                <td>
                    <a href="{{ route('libros.edit', $libro->id) }}">Edit</a>
                    <form id="delete-form-{{ $libro->id }}" action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $libro->id }})">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endif

<script>
    function confirmDelete(libroId) {
        if (confirm('Are you sure you want to delete this book? This action cannot be undone.')) {
            document.getElementById('delete-form-' + libroId).submit();
        }
    }
</script>

</body>
</html>
