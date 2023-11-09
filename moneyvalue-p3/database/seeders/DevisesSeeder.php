<?php

namespace Database\Seeders;

// use App\Models\Devises;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DevisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Devises::factory()->count(3)->create();
    }
}
