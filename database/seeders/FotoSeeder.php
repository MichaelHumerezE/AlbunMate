<?php

namespace Database\Seeders;

use App\Models\Foto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cumpleaños Infantil
        Foto::create([
            'image' => 'eventos/Cumpleano_Infantil/8101649.jpg',
            'id_fotografo' => '9',
            'id_evento' => '1',
        ]);

        Foto::create([
            'image' => 'eventos/Cumpleano_Infantil/8101708.jpg',
            'id_fotografo' => '9',
            'id_evento' => '1',
        ]);

        Foto::create([
            'image' => 'eventos/Cumpleano_Infantil/8104206.jpg',
            'id_fotografo' => '10',
            'id_evento' => '1',
        ]);

        //Cena Familiar
        Foto::create([
            'image' => 'eventos/Festin_Familiar/5774932.jpg',
            'id_fotografo' => '10',
            'id_evento' => '2',
        ]);

        Foto::create([
            'image' => 'eventos/Festin_Familiar/5774936.jpg',
            'id_fotografo' => '10',
            'id_evento' => '2',
        ]);

        Foto::create([
            'image' => 'eventos/Festin_Familiar/5774938.jpg',
            'id_fotografo' => '10',
            'id_evento' => '2',
        ]);

        Foto::create([
            'image' => 'eventos/Festin_Familiar/5775046.jpg',
            'id_fotografo' => '11',
            'id_evento' => '2',
        ]);

        Foto::create([
            'image' => 'eventos/Festin_Familiar/5775050.jpg',
            'id_fotografo' => '11',
            'id_evento' => '2',
        ]);

        //Graduación U - Jaguars
        Foto::create([
            'image' => 'eventos/Graduacion_U_1/1139312.jpg',
            'id_fotografo' => '11',
            'id_evento' => '3',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_1/1139315.jpg',
            'id_fotografo' => '11',
            'id_evento' => '3',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_1/1139317.jpg',
            'id_fotografo' => '9',
            'id_evento' => '3',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_1/14660574.jpg',
            'id_fotografo' => '9',
            'id_evento' => '3',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_1/14660575.jpg',
            'id_fotografo' => '9',
            'id_evento' => '3',
        ]);

        //Graduacion U - Goethans
        Foto::create([
            'image' => 'eventos/Graduacion_U_2/2495233.jpg',
            'id_fotografo' => '9',
            'id_evento' => '4',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_2/8106659.jpg',
            'id_fotografo' => '9',
            'id_evento' => '4',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_2/8106676.jpg',
            'id_fotografo' => '10',
            'id_evento' => '4',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_2/8106679.jpg',
            'id_fotografo' => '10',
            'id_evento' => '4',
        ]);

        Foto::create([
            'image' => 'eventos/Graduacion_U_2/8106683.jpg',
            'id_fotografo' => '10',
            'id_evento' => '4',
        ]);
    }
}
