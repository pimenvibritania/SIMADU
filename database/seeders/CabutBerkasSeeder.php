<?php

namespace Database\Seeders;

use App\Models\CabutBerkas;
use Illuminate\Database\Seeder;

class CabutBerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CabutBerkas::factory()->count(5)->create();
    }
}
