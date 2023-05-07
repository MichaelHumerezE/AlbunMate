<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create([
            'name' => 'Cumpleaños Infantil',
            'descripcion' => '',
            'carpeta' => 'Cumpleano_Infantil',
            'image' => 'eventos/Cumpleano_Infantil/8015132.jpg',
            'direccion' => 'Calle Leonardo da Vinci, 7, 41092',
            'fecha' => '2023-01-25',
            'hora' => '18:00',
            'codigo' => '123456',
            'id_tipoEvento' => '12',
            'id_organizador' => '12',
        ]);

        Evento::create([
            'name' => 'Cena Familiar',
            'descripcion' => '',
            'carpeta' => 'Festin_Familiar',
            'image' => 'eventos/Festin_Familiar/5774928.jpg',
            'direccion' => 'Calle de Velázquez, 80 Madrid',
            'fecha' => '2023-03-14',
            'hora' => '20:00',
            'codigo' => '123456',
            'id_tipoEvento' => '15',
            'id_organizador' => '12',
        ]);

        Evento::create([
            'name' => 'Graduación Universitaria - Jaguars',
            'descripcion' => '',
            'carpeta' => 'Graduacion_U_1',
            'image' => 'eventos/Graduacion_U_1/14658810.jpg',
            'direccion' => 'Industria, 278-280 or San Quintin, 37',
            'fecha' => '2023-04-03',
            'hora' => '14:00',
            'codigo' => '123456',
            'id_tipoEvento' => '13',
            'id_organizador' => '13',
        ]);

        Evento::create([
            'name' => 'Graduación Universitaria - Goethals',
            'descripcion' => '',
            'carpeta' => 'Graduacion_U_2',
            'image' => 'eventos/Graduacion_U_2/7944238.jpg',
            'direccion' => 'Calle San Carlos entre Gacel y Horrutinier',
            'fecha' => '2023-04-27',
            'hora' => '14:00',
            'codigo' => '123456',
            'id_tipoEvento' => '13',
            'id_organizador' => '13',
        ]);
    }
}
