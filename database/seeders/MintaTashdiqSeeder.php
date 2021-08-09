<?php

namespace Database\Seeders;

use App\Models\MintaTashdiq;
use Illuminate\Database\Seeder;

class MintaTashdiqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MintaTashdiq::factory()->count(5)->create();
    }
}
