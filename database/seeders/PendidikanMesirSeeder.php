<?php

namespace Database\Seeders;

use App\Models\PendidikanMesir;
use Illuminate\Database\Seeder;

class PendidikanMesirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendidikanMesir::factory()->count(5)->create();
    }
}
