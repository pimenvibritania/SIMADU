<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenjang::firstOrCreate([
            'name_ar' => 'الابتدائي',
            'name_en' =>'SD'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'الاعدادي',
            'name_en' =>'SLTP'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'الثانوي',
            'name_en' =>'SLTA'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'الجامعة',
            'name_en' =>'Perguruan Tinggi'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'الحضانة',
            'name_en' =>'TK'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'الكورسات',
            'name_en' =>'Kursus'
        ]);
        Jenjang::firstOrCreate([
            'name_ar' => 'دورة لغوية',
            'name_en' =>'Kelas Persiapan'
        ]);
    }
}










