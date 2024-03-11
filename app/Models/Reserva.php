<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'ID_Reserva'; // Nombre de la clave primaria

    protected $fillable = ['Fecha_Reserva', 'Estado', 'ID_Cliente']; // Atributos que se pueden asignar de manera masiva

    // Define la relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }
}
