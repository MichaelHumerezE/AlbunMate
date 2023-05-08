<?php

namespace Database\Seeders;

use App\Models\Suscripcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripcion::create([
            'fechaPago' => '2023-01-07 02:10:54',
            'fechaIni' => '2023-01-07',
            'fechaFin' => '2023-02-07',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '5',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-02-07 02:10:54',
            'fechaIni' => '2023-02-07',
            'fechaFin' => '2023-03-07',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '5',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-03-07 02:10:54',
            'fechaIni' => '2023-03-07',
            'fechaFin' => '2023-04-07',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '5',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-04-07 02:10:54',
            'fechaIni' => '2023-04-07',
            'fechaFin' => '2023-05-07',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '5',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-07 02:10:54',
            'fechaIni' => '2023-05-07',
            'fechaFin' => '2023-06-07',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '5',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '6',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '7',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '5.00',
            'plan' => 'Plan - Invitado',
            'id_usuario' => '8',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '10.00',
            'plan' => 'Plan - Fotógrafo',
            'id_usuario' => '9',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '10.00',
            'plan' => 'Plan - Fotógrafo',
            'id_usuario' => '10',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '10.00',
            'plan' => 'Plan - Fotógrafo',
            'id_usuario' => '11',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '15.00',
            'plan' => 'Plan - Organizador',
            'id_usuario' => '12',
        ]);
        Suscripcion::create([
            'fechaPago' => '2023-05-01 02:10:54',
            'fechaIni' => '2023-05-01',
            'fechaFin' => '2023-06-01',
            'monto' => '15.00',
            'plan' => 'Plan - Organizador',
            'id_usuario' => '13',
        ]);
    }
}
