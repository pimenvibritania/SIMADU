<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstitutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('institutes')->delete();
        
        \DB::table('institutes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_ar' => 'arab',
                'name_en' => 'eng',
                'location' => 'mser',
                'created_at' => '2021-10-24 10:15:55',
                'updated_at' => '2021-10-24 10:15:55',
            ),
        ));
        
        
    }
}