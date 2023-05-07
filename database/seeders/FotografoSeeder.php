<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan',
            'apellidos' => 'Perales',
            'email' => 'Juan@gmail.com',
            'password' => '123456',
            'ci' => '9865314',
            'sexo' => 'M',
            'phone' => '60122212',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '1',
            'tipo_i' => '0',
        ]);

        User::create([
            'name' => 'Marco',
            'apellidos' => 'Peña',
            'email' => 'Marco@gmail.com',
            'password' => '123456',
            'ci' => '6865314',
            'sexo' => 'M',
            'phone' => '61122212',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '1',
            'tipo_i' => '0',
        ]);

        User::create([
            'name' => 'Pablo',
            'apellidos' => 'Mendoza',
            'email' => 'Pablo@gmail.com',
            'password' => '123456',
            'ci' => '6765314',
            'sexo' => 'M',
            'phone' => '63122212',
            'domicilio' => 'Santa Cruz',
            'suscripcion' => '1',
            'tipo_p' => '0',
            'tipo_o' => '0',
            'tipo_f' => '1',
            'tipo_i' => '0',
        ]);
    }
}
