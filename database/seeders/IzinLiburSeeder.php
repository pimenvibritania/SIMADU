<?php

namespace Database\Seeders;

use App\Models\IzinLibur;
use Illuminate\Database\Seeder;

class IzinLiburSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IzinLibur::factory()->count(5)->create();
    }
}
