<?php

namespace Database\Seeders;

use App\Models\Perpustakaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perpustakaan::factory(10)->create();
    }
}
