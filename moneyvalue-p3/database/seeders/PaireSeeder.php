<?php

namespace Database\Seeders;

// use App\Models\Paire;
use Illuminate\Database\Seeder;

class PaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\Paire::factory()->count(3)->create();
    }
}
