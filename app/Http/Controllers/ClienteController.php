<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,Correo_Electronico',
            'telefono' => 'required|string|max:255', // Regla de validación para el campo de teléfono
            'direccion' => 'required|string|max:255', // Regla de validación para el campo de dirección
            // Puedes agregar más reglas de validación según sea necesario
        ]);
    
        // Crear un nuevo cliente en la base de datos
        $cliente = new Cliente();
        $cliente->Nombre = $request->nombre;
        $cliente->Correo_Electronico = $request->correo;
        $cliente->Telefono = $request->telefono; // Asignar el valor del campo de teléfono
        $cliente->Direccion = $request->direccion; // Asignar el valor del campo de dirección
        // Puedes asignar otros campos del cliente aquí
        $cliente->save();
    
        // Redireccionar a una página de éxito o a la lista de clientes
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }
    

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,Correo_Electronico,'.$id,
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            // Agrega más reglas de validación si es necesario
        ]);
    
        // Buscar al cliente a actualizar
        $cliente = Cliente::findOrFail($id);
        
        // Actualizar los datos del cliente
        $cliente->Nombre = $request->nombre;
        $cliente->Correo_Electronico = $request->correo;
        $cliente->Telefono = $request->telefono;
        $cliente->Direccion = $request->direccion;
        // Actualiza otros campos del cliente si es necesario
        $cliente->save();
    
        // Redireccionar a una página de éxito o a la lista de clientes
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Buscar al cliente a eliminar
        $cliente = Cliente::findOrFail($id);
        
        // Eliminar al cliente de la base de datos
        $cliente->delete();

        // Redireccionar a la lista de clientes con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
