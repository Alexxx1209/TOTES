<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre', 'correo_electronico', 'telefono', 'direccion']; // Lista de campos que pueden ser llenados de forma masiva

    // Opcional: Si tu tabla tiene un nombre de clave primaria diferente a 'id', puedes especificarlo aquí
    // protected $primaryKey = 'ID_Cliente';

    // Opcional: Si no quieres utilizar los campos 'created_at' y 'updated_at', puedes deshabilitarlos
    // public $timestamps = false;

    // Otras relaciones, métodos, etc. aquí...
}
