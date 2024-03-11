<!-- resources/views/clientes/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>
    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
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
@endsection
