<!-- resources/views/clientes/create.blade.php -->

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
