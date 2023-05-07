<?php

namespace Database\Seeders;

use App\Models\TipoEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEvento::create(['name' => 'Coorporativo externo']);
        TipoEvento::create(['name' => 'Coorporativo interno']);
        TipoEvento::create(['name' => 'Social']);
        TipoEvento::create(['name' => 'Cultural']);
        TipoEvento::create(['name' => 'Musical']);
        TipoEvento::create(['name' => 'Deportivo']);
        TipoEvento::create(['name' => 'Festival']);
        TipoEvento::create(['name' => 'Feria']);
        TipoEvento::create(['name' => 'Congreso']);
        TipoEvento::create(['name' => 'Exposición']);
        TipoEvento::create(['name' => 'Boda']);
        TipoEvento::create(['name' => 'Cumpleaños']);
        TipoEvento::create(['name' => 'Graduación']);
        TipoEvento::create(['name' => 'Aniversario']);
        TipoEvento::create(['name' => 'Festín']);
    }
}
