<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener IDs de clientes existentes
        $clientesIds = DB::table('clientes')->pluck('id')->toArray();

        // Crear 20 reservas de ejemplo con datos aleatorios
        for ($i = 0; $i < 20; $i++) {
            DB::table('reservas')->insert([
                'Fecha_Reserva' => now(),
                'Estado' => $i % 2 === 0 ? 'Pendiente' : 'Confirmada',
                'ID_Cliente' => $clientesIds[array_rand($clientesIds)],
            ]);
        }
    }
}
