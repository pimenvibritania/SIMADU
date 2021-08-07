<?php

namespace Database\Seeders;

use App\Models\CutiKuliah;
use Illuminate\Database\Seeder;

class CutiKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CutiKuliah::factory()->count(5)->create();
    }
}
