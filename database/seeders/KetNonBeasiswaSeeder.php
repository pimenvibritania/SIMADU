<?php

namespace Database\Seeders;

use App\Models\KetNonBeasiswa;
use Illuminate\Database\Seeder;

class KetNonBeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KetNonBeasiswa::factory()->count(5)->create();
    }
}
