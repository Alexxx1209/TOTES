<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva; // Asegúrate de importar el modelo de Reserva

class ReservaController extends Controller
{
    /**
     * Muestra la vista de reservas.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Obtener todas las reservas desde la base de datos
        $reservas = Reserva::all();
        
        // Retornar la vista de reservas, pasando las reservas obtenidas como datos
        return view('reservas.index', compact('reservas'));
    }
}
