<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Cliente;

class PdfController extends Controller
{
    public function generateClientesPdf()
    {
        // Obtener los datos de los clientes desde la base de datos
        $clientes = Cliente::all();

        // Cargar la vista del informe de clientes en PDF
        $pdf = PDF::loadView('pdf.informe_clientes', compact('clientes'));

        // Descargar el PDF
        return $pdf->download('informe_clientes.pdf');
    }
}
