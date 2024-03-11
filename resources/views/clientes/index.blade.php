<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
</head>
<body>
    <h1>Listado de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Crear nuevo cliente</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->Nombre }}</td>
                    <td>{{ $cliente->Correo_Electronico }}</td>
                    <td>{{ $cliente->Telefono }}</td>
                    <td>{{ $cliente->Direccion }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id) }}">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        <!-- Agregar un formulario para eliminar con confirmación -->
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" id="delete-form-{{ $cliente->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete('{{ $cliente->id }}')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Script para mostrar confirmación antes de eliminar -->
    <script>
        function confirmDelete(clienteId) {
            return confirm('¿Estás seguro de que quieres eliminar este cliente? Esta acción no se puede deshacer.');
        }
    </script>
</body>
</html>
