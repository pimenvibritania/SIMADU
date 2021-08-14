<?php

namespace Database\Seeders;

use App\Models\MasukRuak;
use Illuminate\Database\Seeder;

class MasukRuakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasukRuak::factory()->count(5)->create();
    }
}
