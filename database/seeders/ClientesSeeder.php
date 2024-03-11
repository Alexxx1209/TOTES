<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 clientes de ejemplo con datos aleatorios
        for ($i = 1; $i <= 10; $i++) {
            DB::table('clientes')->insert([
                'Nombre' => "Cliente $i",
                'Correo_Electronico' => "cliente$i@example.com",
                'Telefono' => mt_rand(100000000, 999999999),
                'Direccion' => "Dirección $i",
            ]);
        }
    }
}