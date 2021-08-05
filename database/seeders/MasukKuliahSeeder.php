<?php

namespace Database\Seeders;

use App\Models\MasukKuliah;
use Illuminate\Database\Seeder;

class MasukKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasukKuliah::factory()->count(5)->create();
    }
}
