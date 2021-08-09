<?php

namespace Database\Seeders;

use App\Models\IzinTawaquf;
use Illuminate\Database\Seeder;

class IzinTawaqufSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IzinTawaquf::factory()->count(5)->create();
    }
}
