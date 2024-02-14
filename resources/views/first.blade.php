<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca Online</title>
</head>
<body>
    <h1>Biblioteca Online</h1>
    <ul>
        <li><a href="{{ url('/autores') }}">Autores</a></li>
        <li><a href="{{ url('/libros') }}">Libros</a></li>
        <li><a href="{{ url('/alquileres') }}">Alquileres</a></li>
        <li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
        <li><a href="{{ url('/') }}">Inicio</a></li>
    </ul>
</body>
</html>
