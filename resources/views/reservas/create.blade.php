<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 10px);
            background-position-y: center;
            padding-right: 30px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        
        /* Estilo adicional para el campo de selección de clientes */
        #cliente_id {
            background-color: #fff; /* Fondo blanco */
            height: 40px; /* Ajusta la altura según tus necesidades */
        }
        
        #cliente_id option {
            background-color: #fff; /* Fondo blanco */
            color: #000; /* Texto negro */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Reserva</h1>

        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf

            <div>
                <label for="fecha_reserva">Fecha de Reserva:</label>
                <input type="datetime-local" id="fecha_reserva" name="fecha_reserva">
            </div>

            <div>
                <label for="estado">Estado:</label>
                <select id="estado" name="estado">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Confirmada">Confirmada</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>

            <div>
                <label for="cliente_id">Cliente:</label>
                <div style="height: 200px; overflow-y: auto;">
                    <select id="cliente_id" name="cliente_id">
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit">Crear Reserva</button>
        </form>
    </div>
</body>
</html>
