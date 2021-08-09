<?php

namespace Database\Seeders;

use App\Models\KeringananBiaya;
use Illuminate\Database\Seeder;

class KeringananBiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeringananBiaya::factory()->count(5)->create();
    }
}
