<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class InvitadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invitado = User::create([
            'name' => 'Humberto',
            'apellidos' => 'Lazo Mansilla',
            'email' => 'h@gmail.com',
            'password' => '123456',
            'ci' => '9866028',
            'sexo' => 'M',
            'phone' => '60522218',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '1',
        ]);

        $invitadp = User::create([
            'name' => 'José Miguel',
            'apellidos' => '',
            'email' => 'j@gmail.com',
            'password' => '123456',
            'ci' => '9866029',
            'sexo' => 'M',
            'phone' => '60522219',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '1',
        ]);

        $invitado = User::create([
            'name' => 'Luis Emilio',
            'apellidos' => '',
            'email' => 'l@gmail.com',
            'password' => '123456',
            'ci' => '9864174',
            'sexo' => 'M',
            'phone' => '60521400',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '1',
        ]);

        $invitado = User::create([
            'name' => 'Martha',
            'apellidos' => '',
            'email' => 'm@gmail.com',
            'password' => '123456',
            'ci' => '9864175',
            'sexo' => 'F',
            'phone' => '60521401',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '0',
            'tipo_i' => '1',
        ]);
    }
}
