<?php

namespace Database\Seeders;

use App\Models\MasukMahad;
use Illuminate\Database\Seeder;

class MasukMahadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasukMahad::factory()->count(5)->create();
    }
}
