<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autores</h1>

    <a href="{{ route('autores.create') }}" class="">Añadir autor</a>

    @if ($autores->isEmpty())
        <p>No authors yet.</p>
    @else
        <table>
            <tr>
                <th>ID</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Nacionality</th>
                <th>Actions</th> 
            </tr>
            @foreach ($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->apellidos }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>{{ $autor->sexo }}</td>
                    <td>{{ $autor->edad }}</td>
                    <td>{{ $autor->nacionalidad }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor->id) }}">Edit</a> 
                        <form id="delete-form-{{ $autor->id }}" action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $autor->id }})">Delete</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <script>
        function confirmDelete(autorId) {
            if (confirm('Are you sure you want to delete this author? This action cannot be undone!')) {
                document.getElementById('delete-form-' + autorId).submit();
            }
        }
    </script>

</body>
</html>
