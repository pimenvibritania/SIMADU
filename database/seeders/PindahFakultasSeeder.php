<?php

namespace Database\Seeders;

use App\Models\PindahFakultas;
use Illuminate\Database\Seeder;

class PindahFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PindahFakultas::factory()->count(5)->create();
    }
}
