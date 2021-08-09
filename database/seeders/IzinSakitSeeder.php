<?php

namespace Database\Seeders;

use App\Models\IzinSakit;
use Illuminate\Database\Seeder;

class IzinSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IzinSakit::factory()->count(5)->create();
    }
}
