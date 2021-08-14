<?php

namespace Database\Seeders;

use App\Models\MasterPnbp;
use Illuminate\Database\Seeder;

class MasterPnbpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterPnbp::factory()->count(5)->create();
    }
}
