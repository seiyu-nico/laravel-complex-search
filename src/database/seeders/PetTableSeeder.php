<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pet::factory()->count(10)->create();
    }
}
