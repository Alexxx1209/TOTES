@extends('layouts.app')

@section('content')
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

         /* Estilos para la barra de búsqueda */
    .search-bar {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .search-bar label {
        margin-right: 10px;
    }

    .search-bar input[type="text"] {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .search-bar button {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #0056b3;
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

        /* Estilos para el botón de crear nueva reserva */
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

        /* Estilos para la barra de búsqueda */
        .search-bar {
            margin-bottom: 10px;
        }

    </style>

    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="{{ route('reservas.index') }}" class="nav-link">
            <i class="fas fa-table nav-icon"></i> Reservas
        </a>
        <a href="{{ route('clientes.index') }}" class="nav-link">
            <i class="fas fa-users nav-icon"></i> Clientes
        </a>
    </div>

    <h1 style="color: #007bff;">Listado de Reservas</h1>
    
    <!-- Barra de búsqueda -->
    <form action="{{ route('reservas.index') }}" method="GET" class="search-bar">
        <label for="cliente">Buscar por nombre de cliente:</label>
        <input type="text" id="cliente" name="cliente" value="{{ request()->get('cliente') }}">
        <button type="submit">Buscar</button>
    </form>
    
    <a href="{{ route('reservas.create') }}" class="create-btn">Crear nueva reserva</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Reserva</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->ID_Reserva }}</td>
                    <td>{{ $reserva->Fecha_Reserva }}</td>
                    <td>{{ $reserva->Estado }}</td>
                    <td>{{ $reserva->cliente->Nombre }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->ID_Reserva) }}" class="view-edit-links"><i class="fas fa-eye"></i> Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->ID_Reserva) }}" class="view-edit-links"><i class="fas fa-edit"></i> Editar</a>
                        <button type="button" class="delete-btn" onclick="confirmDelete({{ $reserva->ID_Reserva }})"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        <form id="delete-form-{{ $reserva->ID_Reserva }}" action="{{ route('reservas.destroy', $reserva->ID_Reserva) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Script para confirmar eliminación -->
    <script>
        function confirmDelete(id) {
            if (confirm('¿Estás seguro de eliminar esta reserva?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
