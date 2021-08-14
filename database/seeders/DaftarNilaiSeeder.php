<?php

namespace Database\Seeders;

use App\Models\DaftarNilai;
use Illuminate\Database\Seeder;

class DaftarNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DaftarNilai::factory()->count(5)->create();
    }
}
