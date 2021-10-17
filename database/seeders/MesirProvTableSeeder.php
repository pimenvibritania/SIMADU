<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MesirProvTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mesir_prov')->delete();
        
        \DB::table('mesir_prov')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prov_name' => 'Cairo',
            ),
            1 => 
            array (
                'id' => 2,
                'prov_name' => 'Alexandria',
            ),
            2 => 
            array (
                'id' => 3,
                'prov_name' => 'Giza',
            ),
            3 => 
            array (
                'id' => 4,
                'prov_name' => 'Matrouh',
            ),
            4 => 
            array (
                'id' => 5,
                'prov_name' => 'Kafr El-Sheikh',
            ),
            5 => 
            array (
                'id' => 6,
                'prov_name' => 'El-Dakahlia',
            ),
            6 => 
            array (
                'id' => 7,
                'prov_name' => '10th of Ramadan',
            ),
            7 => 
            array (
                'id' => 8,
                'prov_name' => 'El-Behera',
            ),
            8 => 
            array (
                'id' => 9,
                'prov_name' => 'El-Monofia',
            ),
            9 => 
            array (
                'id' => 10,
                'prov_name' => 'El-Gharbia',
            ),
            10 => 
            array (
                'id' => 11,
                'prov_name' => 'El-Kalyoubia',
            ),
            11 => 
            array (
                'id' => 12,
                'prov_name' => 'Sharkia',
            ),
            12 => 
            array (
                'id' => 13,
                'prov_name' => 'Sadat City',
            ),
            13 => 
            array (
                'id' => 14,
                'prov_name' => 'Port Said',
            ),
            14 => 
            array (
                'id' => 15,
                'prov_name' => 'El-Fayoum',
            ),
            15 => 
            array (
                'id' => 16,
                'prov_name' => 'Bani Sweif',
            ),
            16 => 
            array (
                'id' => 17,
                'prov_name' => 'El-Menia',
            ),
            17 => 
            array (
                'id' => 18,
                'prov_name' => 'Assiout',
            ),
            18 => 
            array (
                'id' => 19,
                'prov_name' => 'Sohag',
            ),
            19 => 
            array (
                'id' => 20,
                'prov_name' => 'Kena',
            ),
            20 => 
            array (
                'id' => 21,
                'prov_name' => 'Luxor',
            ),
            21 => 
            array (
                'id' => 22,
                'prov_name' => 'Aswan',
            ),
            22 => 
            array (
                'id' => 23,
                'prov_name' => 'Damietta',
            ),
            23 => 
            array (
                'id' => 24,
                'prov_name' => 'El-Ismailia',
            ),
            24 => 
            array (
                'id' => 25,
                'prov_name' => 'Suez',
            ),
            25 => 
            array (
                'id' => 26,
                'prov_name' => 'Red Sea',
            ),
            26 => 
            array (
                'id' => 27,
                'prov_name' => 'North Sinai',
            ),
            27 => 
            array (
                'id' => 28,
                'prov_name' => 'South Sinai',
            ),
            28 => 
            array (
                'id' => 29,
                'prov_name' => 'New Valley',
            ),
        ));
        
        
    }
}