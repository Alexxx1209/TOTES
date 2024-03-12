@extends('layouts.app')

@section('content')
    <style>
        /* Estilos para el contenedor de los detalles de la reserva */
        .details-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        /* Estilos para los elementos de la lista de detalles */
        .details-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .details-list li {
            margin-bottom: 10px;
        }

        .details-list li strong {
            font-weight: bold;
            margin-right: 5px;
        }

        /* Estilos para el enlace de volver al listado de reservas */
        .back-link {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="details-container">
        <h1>Detalles de la Reserva</h1>

        <ul class="details-list">
            <li><strong>ID:</strong> {{ $reserva->ID_Reserva }}</li>
            <li><strong>Fecha de Reserva:</strong> {{ $reserva->Fecha_Reserva }}</li>
            <li><strong>Estado:</strong> {{ $reserva->Estado }}</li>
            <li><strong>Cliente:</strong> {{ $reserva->cliente->Nombre }}</li>
            <!-- Agrega más detalles de la reserva según sea necesario -->
        </ul>

        <a href="{{ route('reservas.index') }}" class="back-link">Volver al Listado de Reservas</a>
    </div>
@endsection
