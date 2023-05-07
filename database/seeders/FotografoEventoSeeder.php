<?php

namespace Database\Seeders;

use App\Models\FotografoEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotografoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FotografoEvento::create([
            'id_fotografo' => '9',
            'id_evento' => '1',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '10',
            'id_evento' => '1',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '10',
            'id_evento' => '2',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '11',
            'id_evento' => '2',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '11',
            'id_evento' => '3',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '9',
            'id_evento' => '3',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '9',
            'id_evento' => '4',
        ]);

        FotografoEvento::create([
            'id_fotografo' => '10',
            'id_evento' => '4',
        ]);
    }
}
