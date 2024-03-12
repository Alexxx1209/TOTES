@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para el botón de guardar cambios */
        .save-btn {
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .save-btn:hover {
            background-color: #e63a0f;
        }

        /* Estilos para el formulario */
        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Estilos para el contenido */
        .content {
            margin: 0 auto;
            max-width: 600px;
        }

        h1 {
            color: #007bff;
            font-family: Arial, sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>

    <div class="content">
        <h1>Editar Reserva</h1>

        <form id="edit-reserva-form" action="{{ route('reservas.update', $reserva->ID_Reserva) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo oculto para el ID del cliente -->
            <input type="hidden" name="cliente_id" value="{{ $reserva->ID_Cliente }}">

            <!-- Aquí van los campos del formulario para editar la reserva -->
            <!-- Por ejemplo, puedes tener campos para editar la fecha y el estado -->

            <label for="fecha_reserva">Fecha de Reserva:</label>
            <input type="datetime-local" id="fecha_reserva" name="fecha_reserva" value="{{ $reserva->Fecha_Reserva }}">
            
            <label for="estado">Estado:</label>
            <select id="estado" name="estado">
                <option value="Pendiente" {{ $reserva->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Confirmada" {{ $reserva->Estado == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>

            <button type="button" class="save-btn" onclick="confirmEdit()">Guardar Cambios</button>
        </form>
    </div>

    <script>
        function confirmEdit() {
            if (confirm("¿Estás seguro de que deseas editar esta reserva?")) {
                document.getElementById("edit-reserva-form").submit();
            }
        }
    </script>
@endsection
