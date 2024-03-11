<!-- resources/views/clientes/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>
    <p>Nombre: {{ $cliente->Nombre }}</p>
    <p>Correo Electrónico: {{ $cliente->Correo_Electronico }}</p>
    <p>Teléfono: {{ $cliente->Telefono }}</p>
    <p>Dirección: {{ $cliente->Direccion }}</p>

    <!-- Botón para eliminar el cliente con confirmación -->
    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirmDelete()">Eliminar Cliente</button>
    </form>

    <!-- Script para mostrar confirmación antes de eliminar -->
    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que quieres eliminar este cliente? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
