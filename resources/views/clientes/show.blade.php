@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para el contenedor de detalles del cliente */
        .client-details-container {
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        /* Estilos para el título de detalles del cliente */
        .client-details-title {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Estilos para los detalles del cliente */
        .client-details {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        /* Estilos para el botón de eliminar cliente */
        .delete-btn {
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #e0a800;
        }
    </style>

    <div class="client-details-container">
        <h1 class="client-details-title">Detalles del Cliente</h1>
        <p class="client-details">Nombre: {{ $cliente->Nombre }}</p>
        <p class="client-details">Correo Electrónico: {{ $cliente->Correo_Electronico }}</p>
        <p class="client-details">Teléfono: {{ $cliente->Telefono }}</p>
        <p class="client-details">Dirección: {{ $cliente->Direccion }}</p>

        <!-- Botón para eliminar el cliente con confirmación -->
        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" onclick="return confirmDelete()">Eliminar Cliente</button>
        </form>
    </div>

    <!-- Script para mostrar confirmación antes de eliminar -->
    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que quieres eliminar este cliente? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
