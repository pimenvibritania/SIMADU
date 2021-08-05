<?php

namespace Database\Seeders;

use App\Models\KuliahIftha;
use Illuminate\Database\Seeder;

class KuliahIfthaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KuliahIftha::factory()->count(5)->create();
    }
}
