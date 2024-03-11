<!-- resources/views/reservas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservas.create') }}">Crear nueva reserva</a>
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
                        <a href="{{ route('reservas.show', $reserva->ID_Reserva) }}">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->ID_Reserva) }}">Editar</a>
                        <!-- Agregar un formulario para eliminar -->
                        <form action="{{ route('reservas.destroy', $reserva->ID_Reserva) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
