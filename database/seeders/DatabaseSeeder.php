<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(InvitadoSeeder::class);
        $this->call(FotografoSeeder::class);
        $this->call(OrganizadorSeeder::class);
        $this->call(TipoEventoSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(FotografoEventoSeeder::class);
        $this->call(FotoSeeder::class);
        //$this->call(RecognitionSeeder::class);
        $this->call(SuscripcionSeeder::class);
    }
}
