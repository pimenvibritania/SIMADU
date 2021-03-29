<?php

namespace Database\Seeders;

use App\Models\RiwayatPendidikan;
use Illuminate\Database\Seeder;

class RiwayatPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RiwayatPendidikan::factory()->count(5)->create();
    }
}
