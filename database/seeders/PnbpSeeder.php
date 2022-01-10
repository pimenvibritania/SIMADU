<?php

namespace Database\Seeders;

use App\Models\Pnbp;
use Illuminate\Database\Seeder;

class PnbpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pnbp::factory()->count(5)->create();
    }
}
