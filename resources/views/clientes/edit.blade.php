@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para los campos del formulario */
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        /* Estilos para el botón de enviar */
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    
    <h1>Editar Cliente</h1>
    <form id="edit-client-form" method="POST" action="{{ route('clientes.update', $cliente->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $cliente->Nombre }}">
        </div>

        <div>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" value="{{ $cliente->Correo_Electronico }}">
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ $cliente->Telefono }}">
        </div>

        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="{{ $cliente->Direccion }}">
        </div>

        <!-- Agregar más campos del cliente según sea necesario -->

        <button type="submit">Actualizar Cliente</button>
    </form>

    <!-- Script para mostrar confirmación antes de enviar el formulario -->
    <script>
        document.getElementById('edit-client-form').addEventListener('submit', function(event) {
            var confirmation = confirm('¿Estás seguro de que quieres editar este cliente? Esta acción no se puede deshacer.');
            if (!confirmation) {
                event.preventDefault(); // Cancelar el envío del formulario si el usuario cancela la acción
            }
        });
    </script>
@endsection
