<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
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
</head>
<body>
    <h1>Crear Cliente</h1>
    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </div>

        <div>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo">
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono">
        </div>

        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion">
        </div>

        <!-- Agregar más campos del cliente según sea necesario -->

        <button type="submit">Crear Cliente</button>
    </form>
</body>
</html>
