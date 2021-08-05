<?php

namespace Database\Seeders;

use App\Models\CustomLetter;
use Illuminate\Database\Seeder;

class CustomLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomLetter::factory()->count(5)->create();
    }
}
