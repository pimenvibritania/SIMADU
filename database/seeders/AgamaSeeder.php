<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::firstOrCreate([
            'nama' => 'ISLAM',
        ]);
        Agama::firstOrCreate([
            'nama' => 'KRISTEN',
        ]);
        Agama::firstOrCreate([
            'nama' => 'BUDHA',
        ]);
        Agama::firstOrCreate([
            'nama' => 'HINDU',
        ]);
        Agama::firstOrCreate([
            'nama' => 'KONGHUCU',
        ]);
    }
}
