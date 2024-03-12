<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <style>
        /* Estilos para el encabezado de la tabla */
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }

        /* Estilos para las celdas de la tabla */
        td {
            padding: 10px;
        }

        /* Estilos para el botón de eliminar */
        .delete-btn {
            background-color: #ff6347;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilos para los enlaces de ver y editar */
        .view-edit-links {
            color: #007bff;
            text-decoration: none;
            margin-right: 5px;
        }

        /* Estilos para el botón de crear nuevo cliente */
        .create-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }

        /* Estilos para las filas pares de la tabla */
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilos para la barra de navegación */
        .navbar {
            background-color: #007bff;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Estilos para los enlaces de la barra de navegación */
        .nav-link {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        /* Estilos para los iconos de la barra de navegación */
        .nav-icon {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="{{ route('reservas.index') }}" class="nav-link">
            <i class="fas fa-table nav-icon"></i> Reservas
        </a>
        <a href="{{ route('clientes.index') }}" class="nav-link">
            <i class="fas fa-users nav-icon"></i> Clientes
        </a>
        <a href="{{ route('clientes.pdf') }}" class="nav-link">Descargar informe PDF</a>
        
    </div>

    <h1 style="color: #007bff;">Listado de Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="create-btn">Crear nuevo cliente</a>
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
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="view-edit-links"><i class="fas fa-eye"></i> Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="view-edit-links"><i class="fas fa-edit"></i> Editar</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete('{{ $cliente->id }}')"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        <form id="delete-form-{{ $cliente->id }}" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Script para mostrar confirmación antes de eliminar y enviar el formulario -->
    <script>
        function confirmDelete(clienteId) {
            if (confirm('¿Estás seguro de que quieres eliminar este cliente? Esta acción no se puede deshacer.')) {
                document.getElementById('delete-form-' + clienteId).submit();
            }
        }
    </script>
</body>
</html>
