<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EgyptGovernoratesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('egypt_governorates')->delete();
        
        \DB::table('egypt_governorates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_ar' => 'القاهرة',
                'name_en' => 'Cairo',
            ),
            1 => 
            array (
                'id' => 2,
                'name_ar' => 'الجيزة',
                'name_en' => 'Giza',
            ),
            2 => 
            array (
                'id' => 3,
                'name_ar' => 'الأسكندرية',
                'name_en' => 'Alexandria',
            ),
            3 => 
            array (
                'id' => 4,
                'name_ar' => 'الدقهلية',
                'name_en' => 'Dakahlia',
            ),
            4 => 
            array (
                'id' => 5,
                'name_ar' => 'البحر الأحمر',
                'name_en' => 'Red Sea',
            ),
            5 => 
            array (
                'id' => 6,
                'name_ar' => 'البحيرة',
                'name_en' => 'Beheira',
            ),
            6 => 
            array (
                'id' => 7,
                'name_ar' => 'الفيوم',
                'name_en' => 'Fayoum',
            ),
            7 => 
            array (
                'id' => 8,
                'name_ar' => 'الغربية',
                'name_en' => 'Gharbiya',
            ),
            8 => 
            array (
                'id' => 9,
                'name_ar' => 'الإسماعلية',
                'name_en' => 'Ismailia',
            ),
            9 => 
            array (
                'id' => 10,
                'name_ar' => 'المنوفية',
                'name_en' => 'Menofia',
            ),
            10 => 
            array (
                'id' => 11,
                'name_ar' => 'المنيا',
                'name_en' => 'Minya',
            ),
            11 => 
            array (
                'id' => 12,
                'name_ar' => 'القليوبية',
                'name_en' => 'Qaliubiya',
            ),
            12 => 
            array (
                'id' => 13,
                'name_ar' => 'الوادي الجديد',
                'name_en' => 'New Valley',
            ),
            13 => 
            array (
                'id' => 14,
                'name_ar' => 'السويس',
                'name_en' => 'Suez',
            ),
            14 => 
            array (
                'id' => 15,
                'name_ar' => 'اسوان',
                'name_en' => 'Aswan',
            ),
            15 => 
            array (
                'id' => 16,
                'name_ar' => 'اسيوط',
                'name_en' => 'Assiut',
            ),
            16 => 
            array (
                'id' => 17,
                'name_ar' => 'بني سويف',
                'name_en' => 'Beni Suef',
            ),
            17 => 
            array (
                'id' => 18,
                'name_ar' => 'بورسعيد',
                'name_en' => 'Port Said',
            ),
            18 => 
            array (
                'id' => 19,
                'name_ar' => 'دمياط',
                'name_en' => 'Damietta',
            ),
            19 => 
            array (
                'id' => 20,
                'name_ar' => 'الشرقية',
                'name_en' => 'Sharkia',
            ),
            20 => 
            array (
                'id' => 21,
                'name_ar' => 'جنوب سيناء',
                'name_en' => 'South Sinai',
            ),
            21 => 
            array (
                'id' => 22,
                'name_ar' => 'كفر الشيخ',
                'name_en' => 'Kafr Al sheikh',
            ),
            22 => 
            array (
                'id' => 23,
                'name_ar' => 'مطروح',
                'name_en' => 'Matrouh',
            ),
            23 => 
            array (
                'id' => 24,
                'name_ar' => 'الأقصر',
                'name_en' => 'Luxor',
            ),
            24 => 
            array (
                'id' => 25,
                'name_ar' => 'قنا',
                'name_en' => 'Qena',
            ),
            25 => 
            array (
                'id' => 26,
                'name_ar' => 'شمال سيناء',
                'name_en' => 'North Sinai',
            ),
            26 => 
            array (
                'id' => 27,
                'name_ar' => 'سوهاج',
                'name_en' => 'Sohag',
            ),
        ));
        
        
    }
}