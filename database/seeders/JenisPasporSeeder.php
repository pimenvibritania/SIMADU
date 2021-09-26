<?php

namespace Database\Seeders;

use App\Models\JenisPaspor;
use Illuminate\Database\Seeder;

class JenisPasporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPaspor::firstOrCreate([
            'nama' => 'Biasa',
        ]);
        JenisPaspor::firstOrCreate([
            'nama' => 'Dinas',
        ]);
        JenisPaspor::firstOrCreate([
            'nama' => 'Diplomatik',
        ]);
    }
}
