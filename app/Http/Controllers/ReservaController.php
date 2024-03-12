<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;

class ReservaController extends Controller
{
    /**
     * Muestra la vista de reservas.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Reserva::query();

        // Filtrar por nombre de cliente si se proporciona un parámetro de búsqueda
        if ($request->has('cliente')) {
            $query->whereHas('cliente', function ($query) use ($request) {
                $query->where('Nombre', 'like', '%' . $request->cliente . '%');
            });
        }

        $reservas = $query->get();

        return view('reservas.index', compact('reservas'));
    }

    /**
     * Muestra el formulario para crear una nueva reserva.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Obtener la lista de clientes
        $clientes = Cliente::all(); // O cualquier método que obtenga la lista de clientes según tus necesidades

        // Retornar la vista del formulario de creación de reserva, pasando la lista de clientes como datos
        return view('reservas.create', compact('clientes'));
    }

    /**
     * Almacena una nueva reserva en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            // Aquí puedes colocar tus reglas de validación
        ]);

        // Crear una nueva instancia de Reserva con los datos del formulario
        $reserva = new Reserva();
        $reserva->Fecha_Reserva = $request->fecha_reserva;
        $reserva->Estado = $request->estado;
        $reserva->ID_Cliente = $request->cliente_id;
        // Guardar la reserva en la base de datos
        $reserva->save();

        // Redireccionar a la página de índice de reservas con un mensaje
        return redirect()->route('reservas.index')->with('success', 'La reserva se ha creado correctamente.');
    }

    /**
     * Elimina la reserva especificada de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar la reserva por su ID
        $reserva = Reserva::findOrFail($id);

        // Eliminar la reserva
        $reserva->delete();

        // Redireccionar a la página de índice de reservas con un mensaje
        return redirect()->route('reservas.index')->with('success', 'La reserva se ha eliminado correctamente.');
    }

    /**
     * Muestra el formulario para editar una reserva.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        // Obtener la reserva a editar por su ID
        $reserva = Reserva::findOrFail($id);
        
        // Retornar la vista del formulario de edición, pasando la reserva obtenida como datos
        return view('reservas.edit', compact('reserva'));
    }

    /**
     * Actualiza la reserva especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            // Aquí puedes colocar tus reglas de validación
        ]);
    
        // Buscar la reserva por su ID
        $reserva = Reserva::findOrFail($id);
    
        // Actualizar los campos de la reserva con los datos del formulario
        $reserva->Fecha_Reserva = $request->fecha_reserva;
        $reserva->Estado = $request->estado;
        $reserva->ID_Cliente = $request->cliente_id; // Asegúrate de que este campo está presente en el formulario y se envía correctamente
    
        // Guardar los cambios en la base de datos
        $reserva->save();
    
        // Redireccionar a la página de índice de reservas con un mensaje
        return redirect()->route('reservas.index')->with('success', 'La reserva se ha actualizado correctamente.');
    }
    
    public function show($id)
    {
        // Obtener la reserva por su ID
        $reserva = Reserva::findOrFail($id);
        
        // Retornar la vista de detalles de la reserva, pasando la reserva obtenida como datos
        return view('reservas.show', compact('reserva'));
    }

    // Resto de métodos del controlador...
}

