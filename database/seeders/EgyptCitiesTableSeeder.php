<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EgyptCitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('egypt_cities')->delete();
        
        \DB::table('egypt_cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'egypt_governorate_id' => 1,
                'name_ar' => '15 مايو',
                'name_en' => '15 May',
            ),
            1 => 
            array (
                'id' => 2,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الازبكية',
                'name_en' => 'Al Azbakeyah',
            ),
            2 => 
            array (
                'id' => 3,
                'egypt_governorate_id' => 1,
                'name_ar' => 'البساتين',
                'name_en' => 'Al Basatin',
            ),
            3 => 
            array (
                'id' => 4,
                'egypt_governorate_id' => 1,
                'name_ar' => 'التبين',
                'name_en' => 'Tebin',
            ),
            4 => 
            array (
                'id' => 5,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الخليفة',
                'name_en' => 'El-Khalifa',
            ),
            5 => 
            array (
                'id' => 6,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الدراسة',
                'name_en' => 'El darrasa',
            ),
            6 => 
            array (
                'id' => 7,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الدرب الاحمر',
                'name_en' => 'Aldarb Alahmar',
            ),
            7 => 
            array (
                'id' => 8,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الزاوية الحمراء',
                'name_en' => 'Zawya al-Hamra',
            ),
            8 => 
            array (
                'id' => 9,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الزيتون',
                'name_en' => 'El-Zaytoun',
            ),
            9 => 
            array (
                'id' => 10,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الساحل',
                'name_en' => 'Sahel',
            ),
            10 => 
            array (
                'id' => 11,
                'egypt_governorate_id' => 1,
                'name_ar' => 'السلام',
                'name_en' => 'El Salam',
            ),
            11 => 
            array (
                'id' => 12,
                'egypt_governorate_id' => 1,
                'name_ar' => 'السيدة زينب',
                'name_en' => 'Sayeda Zeinab',
            ),
            12 => 
            array (
                'id' => 13,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الشرابية',
                'name_en' => 'El Sharabeya',
            ),
            13 => 
            array (
                'id' => 14,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مدينة الشروق',
                'name_en' => 'Shorouk',
            ),
            14 => 
            array (
                'id' => 15,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الظاهر',
                'name_en' => 'El Daher',
            ),
            15 => 
            array (
                'id' => 16,
                'egypt_governorate_id' => 1,
                'name_ar' => 'العتبة',
                'name_en' => 'Ataba',
            ),
            16 => 
            array (
                'id' => 17,
                'egypt_governorate_id' => 1,
                'name_ar' => 'القاهرة الجديدة',
                'name_en' => 'New Cairo',
            ),
            17 => 
            array (
                'id' => 18,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المرج',
                'name_en' => 'El Marg',
            ),
            18 => 
            array (
                'id' => 19,
                'egypt_governorate_id' => 1,
                'name_ar' => 'عزبة النخل',
                'name_en' => 'Ezbet el Nakhl',
            ),
            19 => 
            array (
                'id' => 20,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المطرية',
                'name_en' => 'Matareya',
            ),
            20 => 
            array (
                'id' => 21,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المعادى',
                'name_en' => 'Maadi',
            ),
            21 => 
            array (
                'id' => 22,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المعصرة',
                'name_en' => 'Maasara',
            ),
            22 => 
            array (
                'id' => 23,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المقطم',
                'name_en' => 'Mokattam',
            ),
            23 => 
            array (
                'id' => 24,
                'egypt_governorate_id' => 1,
                'name_ar' => 'المنيل',
                'name_en' => 'Manyal',
            ),
            24 => 
            array (
                'id' => 25,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الموسكى',
                'name_en' => 'Mosky',
            ),
            25 => 
            array (
                'id' => 26,
                'egypt_governorate_id' => 1,
                'name_ar' => 'النزهة',
                'name_en' => 'Nozha',
            ),
            26 => 
            array (
                'id' => 27,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الوايلى',
                'name_en' => 'Waily',
            ),
            27 => 
            array (
                'id' => 28,
                'egypt_governorate_id' => 1,
                'name_ar' => 'باب الشعرية',
                'name_en' => 'Bab al-Shereia',
            ),
            28 => 
            array (
                'id' => 29,
                'egypt_governorate_id' => 1,
                'name_ar' => 'بولاق',
                'name_en' => 'Bolaq',
            ),
            29 => 
            array (
                'id' => 30,
                'egypt_governorate_id' => 1,
                'name_ar' => 'جاردن سيتى',
                'name_en' => 'Garden City',
            ),
            30 => 
            array (
                'id' => 31,
                'egypt_governorate_id' => 1,
                'name_ar' => 'حدائق القبة',
                'name_en' => 'Hadayek El-Kobba',
            ),
            31 => 
            array (
                'id' => 32,
                'egypt_governorate_id' => 1,
                'name_ar' => 'حلوان',
                'name_en' => 'Helwan',
            ),
            32 => 
            array (
                'id' => 33,
                'egypt_governorate_id' => 1,
                'name_ar' => 'دار السلام',
                'name_en' => 'Dar Al Salam',
            ),
            33 => 
            array (
                'id' => 34,
                'egypt_governorate_id' => 1,
                'name_ar' => 'شبرا',
                'name_en' => 'Shubra',
            ),
            34 => 
            array (
                'id' => 35,
                'egypt_governorate_id' => 1,
                'name_ar' => 'طره',
                'name_en' => 'Tura',
            ),
            35 => 
            array (
                'id' => 36,
                'egypt_governorate_id' => 1,
                'name_ar' => 'عابدين',
                'name_en' => 'Abdeen',
            ),
            36 => 
            array (
                'id' => 37,
                'egypt_governorate_id' => 1,
                'name_ar' => 'عباسية',
                'name_en' => 'Abaseya',
            ),
            37 => 
            array (
                'id' => 38,
                'egypt_governorate_id' => 1,
                'name_ar' => 'عين شمس',
                'name_en' => 'Ain Shams',
            ),
            38 => 
            array (
                'id' => 39,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مدينة نصر',
                'name_en' => 'Nasr City',
            ),
            39 => 
            array (
                'id' => 40,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مصر الجديدة',
                'name_en' => 'New Heliopolis',
            ),
            40 => 
            array (
                'id' => 41,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مصر القديمة',
                'name_en' => 'Masr Al Qadima',
            ),
            41 => 
            array (
                'id' => 42,
                'egypt_governorate_id' => 1,
                'name_ar' => 'منشية ناصر',
                'name_en' => 'Mansheya Nasir',
            ),
            42 => 
            array (
                'id' => 43,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مدينة بدر',
                'name_en' => 'Badr City',
            ),
            43 => 
            array (
                'id' => 44,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مدينة العبور',
                'name_en' => 'Obour City',
            ),
            44 => 
            array (
                'id' => 45,
                'egypt_governorate_id' => 1,
                'name_ar' => 'وسط البلد',
                'name_en' => 'Cairo Downtown',
            ),
            45 => 
            array (
                'id' => 46,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الزمالك',
                'name_en' => 'Zamalek',
            ),
            46 => 
            array (
                'id' => 47,
                'egypt_governorate_id' => 1,
                'name_ar' => 'قصر النيل',
                'name_en' => 'Kasr El Nile',
            ),
            47 => 
            array (
                'id' => 48,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الرحاب',
                'name_en' => 'Rehab',
            ),
            48 => 
            array (
                'id' => 49,
                'egypt_governorate_id' => 1,
                'name_ar' => 'القطامية',
                'name_en' => 'Katameya',
            ),
            49 => 
            array (
                'id' => 50,
                'egypt_governorate_id' => 1,
                'name_ar' => 'مدينتي',
                'name_en' => 'Madinty',
            ),
            50 => 
            array (
                'id' => 51,
                'egypt_governorate_id' => 1,
                'name_ar' => 'روض الفرج',
                'name_en' => 'Rod Alfarag',
            ),
            51 => 
            array (
                'id' => 52,
                'egypt_governorate_id' => 1,
                'name_ar' => 'شيراتون',
                'name_en' => 'Sheraton',
            ),
            52 => 
            array (
                'id' => 53,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الجمالية',
                'name_en' => 'El-Gamaleya',
            ),
            53 => 
            array (
                'id' => 54,
                'egypt_governorate_id' => 1,
                'name_ar' => 'العاشر من رمضان',
                'name_en' => '10th of Ramadan City',
            ),
            54 => 
            array (
                'id' => 55,
                'egypt_governorate_id' => 1,
                'name_ar' => 'الحلمية',
                'name_en' => 'Helmeyat Alzaytoun',
            ),
            55 => 
            array (
                'id' => 56,
                'egypt_governorate_id' => 1,
                'name_ar' => 'النزهة الجديدة',
                'name_en' => 'New Nozha',
            ),
            56 => 
            array (
                'id' => 57,
                'egypt_governorate_id' => 1,
                'name_ar' => 'العاصمة الإدارية',
                'name_en' => 'Capital New',
            ),
            57 => 
            array (
                'id' => 58,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الجيزة',
                'name_en' => 'Giza',
            ),
            58 => 
            array (
                'id' => 59,
                'egypt_governorate_id' => 2,
                'name_ar' => 'السادس من أكتوبر',
                'name_en' => 'Sixth of October',
            ),
            59 => 
            array (
                'id' => 60,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الشيخ زايد',
                'name_en' => 'Cheikh Zayed',
            ),
            60 => 
            array (
                'id' => 61,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الحوامدية',
                'name_en' => 'Hawamdiyah',
            ),
            61 => 
            array (
                'id' => 62,
                'egypt_governorate_id' => 2,
                'name_ar' => 'البدرشين',
                'name_en' => 'Al Badrasheen',
            ),
            62 => 
            array (
                'id' => 63,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الصف',
                'name_en' => 'Saf',
            ),
            63 => 
            array (
                'id' => 64,
                'egypt_governorate_id' => 2,
                'name_ar' => 'أطفيح',
                'name_en' => 'Atfih',
            ),
            64 => 
            array (
                'id' => 65,
                'egypt_governorate_id' => 2,
                'name_ar' => 'العياط',
                'name_en' => 'Al Ayat',
            ),
            65 => 
            array (
                'id' => 66,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الباويطي',
                'name_en' => 'Al-Bawaiti',
            ),
            66 => 
            array (
                'id' => 67,
                'egypt_governorate_id' => 2,
                'name_ar' => 'منشأة القناطر',
                'name_en' => 'ManshiyetAl Qanater',
            ),
            67 => 
            array (
                'id' => 68,
                'egypt_governorate_id' => 2,
                'name_ar' => 'أوسيم',
                'name_en' => 'Oaseem',
            ),
            68 => 
            array (
                'id' => 69,
                'egypt_governorate_id' => 2,
                'name_ar' => 'كرداسة',
                'name_en' => 'Kerdasa',
            ),
            69 => 
            array (
                'id' => 70,
                'egypt_governorate_id' => 2,
                'name_ar' => 'أبو النمرس',
                'name_en' => 'Abu Nomros',
            ),
            70 => 
            array (
                'id' => 71,
                'egypt_governorate_id' => 2,
                'name_ar' => 'كفر غطاطي',
                'name_en' => 'Kafr Ghati',
            ),
            71 => 
            array (
                'id' => 72,
                'egypt_governorate_id' => 2,
                'name_ar' => 'منشأة البكاري',
                'name_en' => 'Manshiyet Al Bakari',
            ),
            72 => 
            array (
                'id' => 73,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الدقى',
                'name_en' => 'Dokki',
            ),
            73 => 
            array (
                'id' => 74,
                'egypt_governorate_id' => 2,
                'name_ar' => 'العجوزة',
                'name_en' => 'Agouza',
            ),
            74 => 
            array (
                'id' => 75,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الهرم',
                'name_en' => 'Haram',
            ),
            75 => 
            array (
                'id' => 76,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الوراق',
                'name_en' => 'Warraq',
            ),
            76 => 
            array (
                'id' => 77,
                'egypt_governorate_id' => 2,
                'name_ar' => 'امبابة',
                'name_en' => 'Imbaba',
            ),
            77 => 
            array (
                'id' => 78,
                'egypt_governorate_id' => 2,
                'name_ar' => 'بولاق الدكرور',
                'name_en' => 'Boulaq Dakrour',
            ),
            78 => 
            array (
                'id' => 79,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الواحات البحرية',
                'name_en' => 'Al Wahat Al Baharia',
            ),
            79 => 
            array (
                'id' => 80,
                'egypt_governorate_id' => 2,
                'name_ar' => 'العمرانية',
                'name_en' => 'Omraneya',
            ),
            80 => 
            array (
                'id' => 81,
                'egypt_governorate_id' => 2,
                'name_ar' => 'المنيب',
                'name_en' => 'Moneeb',
            ),
            81 => 
            array (
                'id' => 82,
                'egypt_governorate_id' => 2,
                'name_ar' => 'بين السرايات',
                'name_en' => 'Bin Alsarayat',
            ),
            82 => 
            array (
                'id' => 83,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الكيت كات',
                'name_en' => 'Kit Kat',
            ),
            83 => 
            array (
                'id' => 84,
                'egypt_governorate_id' => 2,
                'name_ar' => 'المهندسين',
                'name_en' => 'Mohandessin',
            ),
            84 => 
            array (
                'id' => 85,
                'egypt_governorate_id' => 2,
                'name_ar' => 'فيصل',
                'name_en' => 'Faisal',
            ),
            85 => 
            array (
                'id' => 86,
                'egypt_governorate_id' => 2,
                'name_ar' => 'أبو رواش',
                'name_en' => 'Abu Rawash',
            ),
            86 => 
            array (
                'id' => 87,
                'egypt_governorate_id' => 2,
                'name_ar' => 'حدائق الأهرام',
                'name_en' => 'Hadayek Alahram',
            ),
            87 => 
            array (
                'id' => 88,
                'egypt_governorate_id' => 2,
                'name_ar' => 'الحرانية',
                'name_en' => 'Haraneya',
            ),
            88 => 
            array (
                'id' => 89,
                'egypt_governorate_id' => 2,
                'name_ar' => 'حدائق اكتوبر',
                'name_en' => 'Hadayek October',
            ),
            89 => 
            array (
                'id' => 90,
                'egypt_governorate_id' => 2,
                'name_ar' => 'صفط اللبن',
                'name_en' => 'Saft Allaban',
            ),
            90 => 
            array (
                'id' => 91,
                'egypt_governorate_id' => 2,
                'name_ar' => 'القرية الذكية',
                'name_en' => 'Smart Village',
            ),
            91 => 
            array (
                'id' => 92,
                'egypt_governorate_id' => 2,
                'name_ar' => 'ارض اللواء',
                'name_en' => 'Ard Ellwaa',
            ),
            92 => 
            array (
                'id' => 93,
                'egypt_governorate_id' => 3,
                'name_ar' => 'ابو قير',
                'name_en' => 'Abu Qir',
            ),
            93 => 
            array (
                'id' => 94,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الابراهيمية',
                'name_en' => 'Al Ibrahimeyah',
            ),
            94 => 
            array (
                'id' => 95,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الأزاريطة',
                'name_en' => 'Azarita',
            ),
            95 => 
            array (
                'id' => 96,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الانفوشى',
                'name_en' => 'Anfoushi',
            ),
            96 => 
            array (
                'id' => 97,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الدخيلة',
                'name_en' => 'Dekheila',
            ),
            97 => 
            array (
                'id' => 98,
                'egypt_governorate_id' => 3,
                'name_ar' => 'السيوف',
                'name_en' => 'El Soyof',
            ),
            98 => 
            array (
                'id' => 99,
                'egypt_governorate_id' => 3,
                'name_ar' => 'العامرية',
                'name_en' => 'Ameria',
            ),
            99 => 
            array (
                'id' => 100,
                'egypt_governorate_id' => 3,
                'name_ar' => 'اللبان',
                'name_en' => 'El Labban',
            ),
            100 => 
            array (
                'id' => 101,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المفروزة',
                'name_en' => 'Al Mafrouza',
            ),
            101 => 
            array (
                'id' => 102,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المنتزه',
                'name_en' => 'El Montaza',
            ),
            102 => 
            array (
                'id' => 103,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المنشية',
                'name_en' => 'Mansheya',
            ),
            103 => 
            array (
                'id' => 104,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الناصرية',
                'name_en' => 'Naseria',
            ),
            104 => 
            array (
                'id' => 105,
                'egypt_governorate_id' => 3,
                'name_ar' => 'امبروزو',
                'name_en' => 'Ambrozo',
            ),
            105 => 
            array (
                'id' => 106,
                'egypt_governorate_id' => 3,
                'name_ar' => 'باب شرق',
                'name_en' => 'Bab Sharq',
            ),
            106 => 
            array (
                'id' => 107,
                'egypt_governorate_id' => 3,
                'name_ar' => 'برج العرب',
                'name_en' => 'Bourj Alarab',
            ),
            107 => 
            array (
                'id' => 108,
                'egypt_governorate_id' => 3,
                'name_ar' => 'ستانلى',
                'name_en' => 'Stanley',
            ),
            108 => 
            array (
                'id' => 109,
                'egypt_governorate_id' => 3,
                'name_ar' => 'سموحة',
                'name_en' => 'Smouha',
            ),
            109 => 
            array (
                'id' => 110,
                'egypt_governorate_id' => 3,
                'name_ar' => 'سيدى بشر',
                'name_en' => 'Sidi Bishr',
            ),
            110 => 
            array (
                'id' => 111,
                'egypt_governorate_id' => 3,
                'name_ar' => 'شدس',
                'name_en' => 'Shads',
            ),
            111 => 
            array (
                'id' => 112,
                'egypt_governorate_id' => 3,
                'name_ar' => 'غيط العنب',
                'name_en' => 'Gheet Alenab',
            ),
            112 => 
            array (
                'id' => 113,
                'egypt_governorate_id' => 3,
                'name_ar' => 'فلمينج',
                'name_en' => 'Fleming',
            ),
            113 => 
            array (
                'id' => 114,
                'egypt_governorate_id' => 3,
                'name_ar' => 'فيكتوريا',
                'name_en' => 'Victoria',
            ),
            114 => 
            array (
                'id' => 115,
                'egypt_governorate_id' => 3,
                'name_ar' => 'كامب شيزار',
                'name_en' => 'Camp Shizar',
            ),
            115 => 
            array (
                'id' => 116,
                'egypt_governorate_id' => 3,
                'name_ar' => 'كرموز',
                'name_en' => 'Karmooz',
            ),
            116 => 
            array (
                'id' => 117,
                'egypt_governorate_id' => 3,
                'name_ar' => 'محطة الرمل',
                'name_en' => 'Mahta Alraml',
            ),
            117 => 
            array (
                'id' => 118,
                'egypt_governorate_id' => 3,
                'name_ar' => 'مينا البصل',
                'name_en' => 'Mina El-Basal',
            ),
            118 => 
            array (
                'id' => 119,
                'egypt_governorate_id' => 3,
                'name_ar' => 'العصافرة',
                'name_en' => 'Asafra',
            ),
            119 => 
            array (
                'id' => 120,
                'egypt_governorate_id' => 3,
                'name_ar' => 'العجمي',
                'name_en' => 'Agamy',
            ),
            120 => 
            array (
                'id' => 121,
                'egypt_governorate_id' => 3,
                'name_ar' => 'بكوس',
                'name_en' => 'Bakos',
            ),
            121 => 
            array (
                'id' => 122,
                'egypt_governorate_id' => 3,
                'name_ar' => 'بولكلي',
                'name_en' => 'Boulkly',
            ),
            122 => 
            array (
                'id' => 123,
                'egypt_governorate_id' => 3,
                'name_ar' => 'كليوباترا',
                'name_en' => 'Cleopatra',
            ),
            123 => 
            array (
                'id' => 124,
                'egypt_governorate_id' => 3,
                'name_ar' => 'جليم',
                'name_en' => 'Glim',
            ),
            124 => 
            array (
                'id' => 125,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المعمورة',
                'name_en' => 'Al Mamurah',
            ),
            125 => 
            array (
                'id' => 126,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المندرة',
                'name_en' => 'Al Mandara',
            ),
            126 => 
            array (
                'id' => 127,
                'egypt_governorate_id' => 3,
                'name_ar' => 'محرم بك',
                'name_en' => 'Moharam Bek',
            ),
            127 => 
            array (
                'id' => 128,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الشاطبي',
                'name_en' => 'Elshatby',
            ),
            128 => 
            array (
                'id' => 129,
                'egypt_governorate_id' => 3,
                'name_ar' => 'سيدي جابر',
                'name_en' => 'Sidi Gaber',
            ),
            129 => 
            array (
                'id' => 130,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الساحل الشمالي',
                'name_en' => 'North Coast/sahel',
            ),
            130 => 
            array (
                'id' => 131,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الحضرة',
                'name_en' => 'Alhadra',
            ),
            131 => 
            array (
                'id' => 132,
                'egypt_governorate_id' => 3,
                'name_ar' => 'العطارين',
                'name_en' => 'Alattarin',
            ),
            132 => 
            array (
                'id' => 133,
                'egypt_governorate_id' => 3,
                'name_ar' => 'سيدي كرير',
                'name_en' => 'Sidi Kerir',
            ),
            133 => 
            array (
                'id' => 134,
                'egypt_governorate_id' => 3,
                'name_ar' => 'الجمرك',
                'name_en' => 'Elgomrok',
            ),
            134 => 
            array (
                'id' => 135,
                'egypt_governorate_id' => 3,
                'name_ar' => 'المكس',
                'name_en' => 'Al Max',
            ),
            135 => 
            array (
                'id' => 136,
                'egypt_governorate_id' => 3,
                'name_ar' => 'مارينا',
                'name_en' => 'Marina',
            ),
            136 => 
            array (
                'id' => 137,
                'egypt_governorate_id' => 4,
                'name_ar' => 'المنصورة',
                'name_en' => 'Mansoura',
            ),
            137 => 
            array (
                'id' => 138,
                'egypt_governorate_id' => 4,
                'name_ar' => 'طلخا',
                'name_en' => 'Talkha',
            ),
            138 => 
            array (
                'id' => 139,
                'egypt_governorate_id' => 4,
                'name_ar' => 'ميت غمر',
                'name_en' => 'Mitt Ghamr',
            ),
            139 => 
            array (
                'id' => 140,
                'egypt_governorate_id' => 4,
                'name_ar' => 'دكرنس',
                'name_en' => 'Dekernes',
            ),
            140 => 
            array (
                'id' => 141,
                'egypt_governorate_id' => 4,
                'name_ar' => 'أجا',
                'name_en' => 'Aga',
            ),
            141 => 
            array (
                'id' => 142,
                'egypt_governorate_id' => 4,
                'name_ar' => 'منية النصر',
                'name_en' => 'Menia El Nasr',
            ),
            142 => 
            array (
                'id' => 143,
                'egypt_governorate_id' => 4,
                'name_ar' => 'السنبلاوين',
                'name_en' => 'Sinbillawin',
            ),
            143 => 
            array (
                'id' => 144,
                'egypt_governorate_id' => 4,
                'name_ar' => 'الكردي',
                'name_en' => 'El Kurdi',
            ),
            144 => 
            array (
                'id' => 145,
                'egypt_governorate_id' => 4,
                'name_ar' => 'بني عبيد',
                'name_en' => 'Bani Ubaid',
            ),
            145 => 
            array (
                'id' => 146,
                'egypt_governorate_id' => 4,
                'name_ar' => 'المنزلة',
                'name_en' => 'Al Manzala',
            ),
            146 => 
            array (
                'id' => 147,
                'egypt_governorate_id' => 4,
                'name_ar' => 'تمي الأمديد',
                'name_en' => 'tami al\'amdid',
            ),
            147 => 
            array (
                'id' => 148,
                'egypt_governorate_id' => 4,
                'name_ar' => 'الجمالية',
                'name_en' => 'aljamalia',
            ),
            148 => 
            array (
                'id' => 149,
                'egypt_governorate_id' => 4,
                'name_ar' => 'شربين',
                'name_en' => 'Sherbin',
            ),
            149 => 
            array (
                'id' => 150,
                'egypt_governorate_id' => 4,
                'name_ar' => 'المطرية',
                'name_en' => 'Mataria',
            ),
            150 => 
            array (
                'id' => 151,
                'egypt_governorate_id' => 4,
                'name_ar' => 'بلقاس',
                'name_en' => 'Belqas',
            ),
            151 => 
            array (
                'id' => 152,
                'egypt_governorate_id' => 4,
                'name_ar' => 'ميت سلسيل',
                'name_en' => 'Meet Salsil',
            ),
            152 => 
            array (
                'id' => 153,
                'egypt_governorate_id' => 4,
                'name_ar' => 'جمصة',
                'name_en' => 'Gamasa',
            ),
            153 => 
            array (
                'id' => 154,
                'egypt_governorate_id' => 4,
                'name_ar' => 'محلة دمنة',
                'name_en' => 'Mahalat Damana',
            ),
            154 => 
            array (
                'id' => 155,
                'egypt_governorate_id' => 4,
                'name_ar' => 'نبروه',
                'name_en' => 'Nabroh',
            ),
            155 => 
            array (
                'id' => 156,
                'egypt_governorate_id' => 5,
                'name_ar' => 'الغردقة',
                'name_en' => 'Hurghada',
            ),
            156 => 
            array (
                'id' => 157,
                'egypt_governorate_id' => 5,
                'name_ar' => 'رأس غارب',
                'name_en' => 'Ras Ghareb',
            ),
            157 => 
            array (
                'id' => 158,
                'egypt_governorate_id' => 5,
                'name_ar' => 'سفاجا',
                'name_en' => 'Safaga',
            ),
            158 => 
            array (
                'id' => 159,
                'egypt_governorate_id' => 5,
                'name_ar' => 'القصير',
                'name_en' => 'El Qusiar',
            ),
            159 => 
            array (
                'id' => 160,
                'egypt_governorate_id' => 5,
                'name_ar' => 'مرسى علم',
                'name_en' => 'Marsa Alam',
            ),
            160 => 
            array (
                'id' => 161,
                'egypt_governorate_id' => 5,
                'name_ar' => 'الشلاتين',
                'name_en' => 'Shalatin',
            ),
            161 => 
            array (
                'id' => 162,
                'egypt_governorate_id' => 5,
                'name_ar' => 'حلايب',
                'name_en' => 'Halaib',
            ),
            162 => 
            array (
                'id' => 163,
                'egypt_governorate_id' => 5,
                'name_ar' => 'الدهار',
                'name_en' => 'Aldahar',
            ),
            163 => 
            array (
                'id' => 164,
                'egypt_governorate_id' => 6,
                'name_ar' => 'دمنهور',
                'name_en' => 'Damanhour',
            ),
            164 => 
            array (
                'id' => 165,
                'egypt_governorate_id' => 6,
                'name_ar' => 'كفر الدوار',
                'name_en' => 'Kafr El Dawar',
            ),
            165 => 
            array (
                'id' => 166,
                'egypt_governorate_id' => 6,
                'name_ar' => 'رشيد',
                'name_en' => 'Rashid',
            ),
            166 => 
            array (
                'id' => 167,
                'egypt_governorate_id' => 6,
                'name_ar' => 'إدكو',
                'name_en' => 'Edco',
            ),
            167 => 
            array (
                'id' => 168,
                'egypt_governorate_id' => 6,
                'name_ar' => 'أبو المطامير',
                'name_en' => 'Abu al-Matamir',
            ),
            168 => 
            array (
                'id' => 169,
                'egypt_governorate_id' => 6,
                'name_ar' => 'أبو حمص',
                'name_en' => 'Abu Homs',
            ),
            169 => 
            array (
                'id' => 170,
                'egypt_governorate_id' => 6,
                'name_ar' => 'الدلنجات',
                'name_en' => 'Delengat',
            ),
            170 => 
            array (
                'id' => 171,
                'egypt_governorate_id' => 6,
                'name_ar' => 'المحمودية',
                'name_en' => 'Mahmoudiyah',
            ),
            171 => 
            array (
                'id' => 172,
                'egypt_governorate_id' => 6,
                'name_ar' => 'الرحمانية',
                'name_en' => 'Rahmaniyah',
            ),
            172 => 
            array (
                'id' => 173,
                'egypt_governorate_id' => 6,
                'name_ar' => 'إيتاي البارود',
                'name_en' => 'Itai Baroud',
            ),
            173 => 
            array (
                'id' => 174,
                'egypt_governorate_id' => 6,
                'name_ar' => 'حوش عيسى',
                'name_en' => 'Housh Eissa',
            ),
            174 => 
            array (
                'id' => 175,
                'egypt_governorate_id' => 6,
                'name_ar' => 'شبراخيت',
                'name_en' => 'Shubrakhit',
            ),
            175 => 
            array (
                'id' => 176,
                'egypt_governorate_id' => 6,
                'name_ar' => 'كوم حمادة',
                'name_en' => 'Kom Hamada',
            ),
            176 => 
            array (
                'id' => 177,
                'egypt_governorate_id' => 6,
                'name_ar' => 'بدر',
                'name_en' => 'Badr',
            ),
            177 => 
            array (
                'id' => 178,
                'egypt_governorate_id' => 6,
                'name_ar' => 'وادي النطرون',
                'name_en' => 'Wadi Natrun',
            ),
            178 => 
            array (
                'id' => 179,
                'egypt_governorate_id' => 6,
                'name_ar' => 'النوبارية الجديدة',
                'name_en' => 'New Nubaria',
            ),
            179 => 
            array (
                'id' => 180,
                'egypt_governorate_id' => 6,
                'name_ar' => 'النوبارية',
                'name_en' => 'Alnoubareya',
            ),
            180 => 
            array (
                'id' => 181,
                'egypt_governorate_id' => 7,
                'name_ar' => 'الفيوم',
                'name_en' => 'Fayoum',
            ),
            181 => 
            array (
                'id' => 182,
                'egypt_governorate_id' => 7,
                'name_ar' => 'الفيوم الجديدة',
                'name_en' => 'Fayoum El Gedida',
            ),
            182 => 
            array (
                'id' => 183,
                'egypt_governorate_id' => 7,
                'name_ar' => 'طامية',
                'name_en' => 'Tamiya',
            ),
            183 => 
            array (
                'id' => 184,
                'egypt_governorate_id' => 7,
                'name_ar' => 'سنورس',
                'name_en' => 'Snores',
            ),
            184 => 
            array (
                'id' => 185,
                'egypt_governorate_id' => 7,
                'name_ar' => 'إطسا',
                'name_en' => 'Etsa',
            ),
            185 => 
            array (
                'id' => 186,
                'egypt_governorate_id' => 7,
                'name_ar' => 'إبشواي',
                'name_en' => 'Epschway',
            ),
            186 => 
            array (
                'id' => 187,
                'egypt_governorate_id' => 7,
                'name_ar' => 'يوسف الصديق',
                'name_en' => 'Yusuf El Sediaq',
            ),
            187 => 
            array (
                'id' => 188,
                'egypt_governorate_id' => 7,
                'name_ar' => 'الحادقة',
                'name_en' => 'Hadqa',
            ),
            188 => 
            array (
                'id' => 189,
                'egypt_governorate_id' => 7,
                'name_ar' => 'اطسا',
                'name_en' => 'Atsa',
            ),
            189 => 
            array (
                'id' => 190,
                'egypt_governorate_id' => 7,
                'name_ar' => 'الجامعة',
                'name_en' => 'Algamaa',
            ),
            190 => 
            array (
                'id' => 191,
                'egypt_governorate_id' => 7,
                'name_ar' => 'السيالة',
                'name_en' => 'Sayala',
            ),
            191 => 
            array (
                'id' => 192,
                'egypt_governorate_id' => 8,
                'name_ar' => 'طنطا',
                'name_en' => 'Tanta',
            ),
            192 => 
            array (
                'id' => 193,
                'egypt_governorate_id' => 8,
                'name_ar' => 'المحلة الكبرى',
                'name_en' => 'Al Mahalla Al Kobra',
            ),
            193 => 
            array (
                'id' => 194,
                'egypt_governorate_id' => 8,
                'name_ar' => 'كفر الزيات',
                'name_en' => 'Kafr El Zayat',
            ),
            194 => 
            array (
                'id' => 195,
                'egypt_governorate_id' => 8,
                'name_ar' => 'زفتى',
                'name_en' => 'Zefta',
            ),
            195 => 
            array (
                'id' => 196,
                'egypt_governorate_id' => 8,
                'name_ar' => 'السنطة',
                'name_en' => 'El Santa',
            ),
            196 => 
            array (
                'id' => 197,
                'egypt_governorate_id' => 8,
                'name_ar' => 'قطور',
                'name_en' => 'Qutour',
            ),
            197 => 
            array (
                'id' => 198,
                'egypt_governorate_id' => 8,
                'name_ar' => 'بسيون',
                'name_en' => 'Basion',
            ),
            198 => 
            array (
                'id' => 199,
                'egypt_governorate_id' => 8,
                'name_ar' => 'سمنود',
                'name_en' => 'Samannoud',
            ),
            199 => 
            array (
                'id' => 200,
                'egypt_governorate_id' => 9,
                'name_ar' => 'الإسماعيلية',
                'name_en' => 'Ismailia',
            ),
            200 => 
            array (
                'id' => 201,
                'egypt_governorate_id' => 9,
                'name_ar' => 'فايد',
                'name_en' => 'Fayed',
            ),
            201 => 
            array (
                'id' => 202,
                'egypt_governorate_id' => 9,
                'name_ar' => 'القنطرة شرق',
                'name_en' => 'Qantara Sharq',
            ),
            202 => 
            array (
                'id' => 203,
                'egypt_governorate_id' => 9,
                'name_ar' => 'القنطرة غرب',
                'name_en' => 'Qantara Gharb',
            ),
            203 => 
            array (
                'id' => 204,
                'egypt_governorate_id' => 9,
                'name_ar' => 'التل الكبير',
                'name_en' => 'El Tal El Kabier',
            ),
            204 => 
            array (
                'id' => 205,
                'egypt_governorate_id' => 9,
                'name_ar' => 'أبو صوير',
                'name_en' => 'Abu Sawir',
            ),
            205 => 
            array (
                'id' => 206,
                'egypt_governorate_id' => 9,
                'name_ar' => 'القصاصين الجديدة',
                'name_en' => 'Kasasien El Gedida',
            ),
            206 => 
            array (
                'id' => 207,
                'egypt_governorate_id' => 9,
                'name_ar' => 'نفيشة',
                'name_en' => 'Nefesha',
            ),
            207 => 
            array (
                'id' => 208,
                'egypt_governorate_id' => 9,
                'name_ar' => 'الشيخ زايد',
                'name_en' => 'Sheikh Zayed',
            ),
            208 => 
            array (
                'id' => 209,
                'egypt_governorate_id' => 10,
                'name_ar' => 'شبين الكوم',
                'name_en' => 'Shbeen El Koom',
            ),
            209 => 
            array (
                'id' => 210,
                'egypt_governorate_id' => 10,
                'name_ar' => 'مدينة السادات',
                'name_en' => 'Sadat City',
            ),
            210 => 
            array (
                'id' => 211,
                'egypt_governorate_id' => 10,
                'name_ar' => 'منوف',
                'name_en' => 'Menouf',
            ),
            211 => 
            array (
                'id' => 212,
                'egypt_governorate_id' => 10,
                'name_ar' => 'سرس الليان',
                'name_en' => 'Sars El-Layan',
            ),
            212 => 
            array (
                'id' => 213,
                'egypt_governorate_id' => 10,
                'name_ar' => 'أشمون',
                'name_en' => 'Ashmon',
            ),
            213 => 
            array (
                'id' => 214,
                'egypt_governorate_id' => 10,
                'name_ar' => 'الباجور',
                'name_en' => 'Al Bagor',
            ),
            214 => 
            array (
                'id' => 215,
                'egypt_governorate_id' => 10,
                'name_ar' => 'قويسنا',
                'name_en' => 'Quesna',
            ),
            215 => 
            array (
                'id' => 216,
                'egypt_governorate_id' => 10,
                'name_ar' => 'بركة السبع',
                'name_en' => 'Berkat El Saba',
            ),
            216 => 
            array (
                'id' => 217,
                'egypt_governorate_id' => 10,
                'name_ar' => 'تلا',
                'name_en' => 'Tala',
            ),
            217 => 
            array (
                'id' => 218,
                'egypt_governorate_id' => 10,
                'name_ar' => 'الشهداء',
                'name_en' => 'Al Shohada',
            ),
            218 => 
            array (
                'id' => 219,
                'egypt_governorate_id' => 11,
                'name_ar' => 'المنيا',
                'name_en' => 'Minya',
            ),
            219 => 
            array (
                'id' => 220,
                'egypt_governorate_id' => 11,
                'name_ar' => 'المنيا الجديدة',
                'name_en' => 'Minya El Gedida',
            ),
            220 => 
            array (
                'id' => 221,
                'egypt_governorate_id' => 11,
                'name_ar' => 'العدوة',
                'name_en' => 'El Adwa',
            ),
            221 => 
            array (
                'id' => 222,
                'egypt_governorate_id' => 11,
                'name_ar' => 'مغاغة',
                'name_en' => 'Magagha',
            ),
            222 => 
            array (
                'id' => 223,
                'egypt_governorate_id' => 11,
                'name_ar' => 'بني مزار',
                'name_en' => 'Bani Mazar',
            ),
            223 => 
            array (
                'id' => 224,
                'egypt_governorate_id' => 11,
                'name_ar' => 'مطاي',
                'name_en' => 'Mattay',
            ),
            224 => 
            array (
                'id' => 225,
                'egypt_governorate_id' => 11,
                'name_ar' => 'سمالوط',
                'name_en' => 'Samalut',
            ),
            225 => 
            array (
                'id' => 226,
                'egypt_governorate_id' => 11,
                'name_ar' => 'المدينة الفكرية',
                'name_en' => 'Madinat El Fekria',
            ),
            226 => 
            array (
                'id' => 227,
                'egypt_governorate_id' => 11,
                'name_ar' => 'ملوي',
                'name_en' => 'Meloy',
            ),
            227 => 
            array (
                'id' => 228,
                'egypt_governorate_id' => 11,
                'name_ar' => 'دير مواس',
                'name_en' => 'Deir Mawas',
            ),
            228 => 
            array (
                'id' => 229,
                'egypt_governorate_id' => 11,
                'name_ar' => 'ابو قرقاص',
                'name_en' => 'Abu Qurqas',
            ),
            229 => 
            array (
                'id' => 230,
                'egypt_governorate_id' => 11,
                'name_ar' => 'ارض سلطان',
                'name_en' => 'Ard Sultan',
            ),
            230 => 
            array (
                'id' => 231,
                'egypt_governorate_id' => 12,
                'name_ar' => 'بنها',
                'name_en' => 'Banha',
            ),
            231 => 
            array (
                'id' => 232,
                'egypt_governorate_id' => 12,
                'name_ar' => 'قليوب',
                'name_en' => 'Qalyub',
            ),
            232 => 
            array (
                'id' => 233,
                'egypt_governorate_id' => 12,
                'name_ar' => 'شبرا الخيمة',
                'name_en' => 'Shubra Al Khaimah',
            ),
            233 => 
            array (
                'id' => 234,
                'egypt_governorate_id' => 12,
                'name_ar' => 'القناطر الخيرية',
                'name_en' => 'Al Qanater Charity',
            ),
            234 => 
            array (
                'id' => 235,
                'egypt_governorate_id' => 12,
                'name_ar' => 'الخانكة',
                'name_en' => 'Khanka',
            ),
            235 => 
            array (
                'id' => 236,
                'egypt_governorate_id' => 12,
                'name_ar' => 'كفر شكر',
                'name_en' => 'Kafr Shukr',
            ),
            236 => 
            array (
                'id' => 237,
                'egypt_governorate_id' => 12,
                'name_ar' => 'طوخ',
                'name_en' => 'Tukh',
            ),
            237 => 
            array (
                'id' => 238,
                'egypt_governorate_id' => 12,
                'name_ar' => 'قها',
                'name_en' => 'Qaha',
            ),
            238 => 
            array (
                'id' => 239,
                'egypt_governorate_id' => 12,
                'name_ar' => 'العبور',
                'name_en' => 'Obour',
            ),
            239 => 
            array (
                'id' => 240,
                'egypt_governorate_id' => 12,
                'name_ar' => 'الخصوص',
                'name_en' => 'Khosous',
            ),
            240 => 
            array (
                'id' => 241,
                'egypt_governorate_id' => 12,
                'name_ar' => 'شبين القناطر',
                'name_en' => 'Shibin Al Qanater',
            ),
            241 => 
            array (
                'id' => 242,
                'egypt_governorate_id' => 12,
                'name_ar' => 'مسطرد',
                'name_en' => 'Mostorod',
            ),
            242 => 
            array (
                'id' => 243,
                'egypt_governorate_id' => 13,
                'name_ar' => 'الخارجة',
                'name_en' => 'El Kharga',
            ),
            243 => 
            array (
                'id' => 244,
                'egypt_governorate_id' => 13,
                'name_ar' => 'باريس',
                'name_en' => 'Paris',
            ),
            244 => 
            array (
                'id' => 245,
                'egypt_governorate_id' => 13,
                'name_ar' => 'موط',
                'name_en' => 'Mout',
            ),
            245 => 
            array (
                'id' => 246,
                'egypt_governorate_id' => 13,
                'name_ar' => 'الفرافرة',
                'name_en' => 'Farafra',
            ),
            246 => 
            array (
                'id' => 247,
                'egypt_governorate_id' => 13,
                'name_ar' => 'بلاط',
                'name_en' => 'Balat',
            ),
            247 => 
            array (
                'id' => 248,
                'egypt_governorate_id' => 13,
                'name_ar' => 'الداخلة',
                'name_en' => 'Dakhla',
            ),
            248 => 
            array (
                'id' => 249,
                'egypt_governorate_id' => 14,
                'name_ar' => 'السويس',
                'name_en' => 'Suez',
            ),
            249 => 
            array (
                'id' => 250,
                'egypt_governorate_id' => 14,
                'name_ar' => 'الجناين',
                'name_en' => 'Alganayen',
            ),
            250 => 
            array (
                'id' => 251,
                'egypt_governorate_id' => 14,
                'name_ar' => 'عتاقة',
                'name_en' => 'Ataqah',
            ),
            251 => 
            array (
                'id' => 252,
                'egypt_governorate_id' => 14,
                'name_ar' => 'العين السخنة',
                'name_en' => 'Ain Sokhna',
            ),
            252 => 
            array (
                'id' => 253,
                'egypt_governorate_id' => 14,
                'name_ar' => 'فيصل',
                'name_en' => 'Faysal',
            ),
            253 => 
            array (
                'id' => 254,
                'egypt_governorate_id' => 15,
                'name_ar' => 'أسوان',
                'name_en' => 'Aswan',
            ),
            254 => 
            array (
                'id' => 255,
                'egypt_governorate_id' => 15,
                'name_ar' => 'أسوان الجديدة',
                'name_en' => 'Aswan El Gedida',
            ),
            255 => 
            array (
                'id' => 256,
                'egypt_governorate_id' => 15,
                'name_ar' => 'دراو',
                'name_en' => 'Drau',
            ),
            256 => 
            array (
                'id' => 257,
                'egypt_governorate_id' => 15,
                'name_ar' => 'كوم أمبو',
                'name_en' => 'Kom Ombo',
            ),
            257 => 
            array (
                'id' => 258,
                'egypt_governorate_id' => 15,
                'name_ar' => 'نصر النوبة',
                'name_en' => 'Nasr Al Nuba',
            ),
            258 => 
            array (
                'id' => 259,
                'egypt_governorate_id' => 15,
                'name_ar' => 'كلابشة',
                'name_en' => 'Kalabsha',
            ),
            259 => 
            array (
                'id' => 260,
                'egypt_governorate_id' => 15,
                'name_ar' => 'إدفو',
                'name_en' => 'Edfu',
            ),
            260 => 
            array (
                'id' => 261,
                'egypt_governorate_id' => 15,
                'name_ar' => 'الرديسية',
                'name_en' => 'Al-Radisiyah',
            ),
            261 => 
            array (
                'id' => 262,
                'egypt_governorate_id' => 15,
                'name_ar' => 'البصيلية',
                'name_en' => 'Al Basilia',
            ),
            262 => 
            array (
                'id' => 263,
                'egypt_governorate_id' => 15,
                'name_ar' => 'السباعية',
                'name_en' => 'Al Sibaeia',
            ),
            263 => 
            array (
                'id' => 264,
                'egypt_governorate_id' => 15,
                'name_ar' => 'ابوسمبل السياحية',
                'name_en' => 'Abo Simbl Al Siyahia',
            ),
            264 => 
            array (
                'id' => 265,
                'egypt_governorate_id' => 15,
                'name_ar' => 'مرسى علم',
                'name_en' => 'Marsa Alam',
            ),
            265 => 
            array (
                'id' => 266,
                'egypt_governorate_id' => 16,
                'name_ar' => 'أسيوط',
                'name_en' => 'Assiut',
            ),
            266 => 
            array (
                'id' => 267,
                'egypt_governorate_id' => 16,
                'name_ar' => 'أسيوط الجديدة',
                'name_en' => 'Assiut El Gedida',
            ),
            267 => 
            array (
                'id' => 268,
                'egypt_governorate_id' => 16,
                'name_ar' => 'ديروط',
                'name_en' => 'Dayrout',
            ),
            268 => 
            array (
                'id' => 269,
                'egypt_governorate_id' => 16,
                'name_ar' => 'منفلوط',
                'name_en' => 'Manfalut',
            ),
            269 => 
            array (
                'id' => 270,
                'egypt_governorate_id' => 16,
                'name_ar' => 'القوصية',
                'name_en' => 'Qusiya',
            ),
            270 => 
            array (
                'id' => 271,
                'egypt_governorate_id' => 16,
                'name_ar' => 'أبنوب',
                'name_en' => 'Abnoub',
            ),
            271 => 
            array (
                'id' => 272,
                'egypt_governorate_id' => 16,
                'name_ar' => 'أبو تيج',
                'name_en' => 'Abu Tig',
            ),
            272 => 
            array (
                'id' => 273,
                'egypt_governorate_id' => 16,
                'name_ar' => 'الغنايم',
                'name_en' => 'El Ghanaim',
            ),
            273 => 
            array (
                'id' => 274,
                'egypt_governorate_id' => 16,
                'name_ar' => 'ساحل سليم',
                'name_en' => 'Sahel Selim',
            ),
            274 => 
            array (
                'id' => 275,
                'egypt_governorate_id' => 16,
                'name_ar' => 'البداري',
                'name_en' => 'El Badari',
            ),
            275 => 
            array (
                'id' => 276,
                'egypt_governorate_id' => 16,
                'name_ar' => 'صدفا',
                'name_en' => 'Sidfa',
            ),
            276 => 
            array (
                'id' => 277,
                'egypt_governorate_id' => 17,
                'name_ar' => 'بني سويف',
                'name_en' => 'Bani Sweif',
            ),
            277 => 
            array (
                'id' => 278,
                'egypt_governorate_id' => 17,
                'name_ar' => 'بني سويف الجديدة',
                'name_en' => 'Beni Suef El Gedida',
            ),
            278 => 
            array (
                'id' => 279,
                'egypt_governorate_id' => 17,
                'name_ar' => 'الواسطى',
                'name_en' => 'Al Wasta',
            ),
            279 => 
            array (
                'id' => 280,
                'egypt_governorate_id' => 17,
                'name_ar' => 'ناصر',
                'name_en' => 'Naser',
            ),
            280 => 
            array (
                'id' => 281,
                'egypt_governorate_id' => 17,
                'name_ar' => 'إهناسيا',
                'name_en' => 'Ehnasia',
            ),
            281 => 
            array (
                'id' => 282,
                'egypt_governorate_id' => 17,
                'name_ar' => 'ببا',
                'name_en' => 'beba',
            ),
            282 => 
            array (
                'id' => 283,
                'egypt_governorate_id' => 17,
                'name_ar' => 'الفشن',
                'name_en' => 'Fashn',
            ),
            283 => 
            array (
                'id' => 284,
                'egypt_governorate_id' => 17,
                'name_ar' => 'سمسطا',
                'name_en' => 'Somasta',
            ),
            284 => 
            array (
                'id' => 285,
                'egypt_governorate_id' => 17,
                'name_ar' => 'الاباصيرى',
                'name_en' => 'Alabbaseri',
            ),
            285 => 
            array (
                'id' => 286,
                'egypt_governorate_id' => 17,
                'name_ar' => 'مقبل',
                'name_en' => 'Mokbel',
            ),
            286 => 
            array (
                'id' => 287,
                'egypt_governorate_id' => 18,
                'name_ar' => 'بورسعيد',
                'name_en' => 'PorSaid',
            ),
            287 => 
            array (
                'id' => 288,
                'egypt_governorate_id' => 18,
                'name_ar' => 'بورفؤاد',
                'name_en' => 'Port Fouad',
            ),
            288 => 
            array (
                'id' => 289,
                'egypt_governorate_id' => 18,
                'name_ar' => 'العرب',
                'name_en' => 'Alarab',
            ),
            289 => 
            array (
                'id' => 290,
                'egypt_governorate_id' => 18,
                'name_ar' => 'حى الزهور',
                'name_en' => 'Zohour',
            ),
            290 => 
            array (
                'id' => 291,
                'egypt_governorate_id' => 18,
                'name_ar' => 'حى الشرق',
                'name_en' => 'Alsharq',
            ),
            291 => 
            array (
                'id' => 292,
                'egypt_governorate_id' => 18,
                'name_ar' => 'حى الضواحى',
                'name_en' => 'Aldawahi',
            ),
            292 => 
            array (
                'id' => 293,
                'egypt_governorate_id' => 18,
                'name_ar' => 'حى المناخ',
                'name_en' => 'Almanakh',
            ),
            293 => 
            array (
                'id' => 294,
                'egypt_governorate_id' => 18,
                'name_ar' => 'حى مبارك',
                'name_en' => 'Mubarak',
            ),
            294 => 
            array (
                'id' => 295,
                'egypt_governorate_id' => 19,
                'name_ar' => 'دمياط',
                'name_en' => 'Damietta',
            ),
            295 => 
            array (
                'id' => 296,
                'egypt_governorate_id' => 19,
                'name_ar' => 'دمياط الجديدة',
                'name_en' => 'New Damietta',
            ),
            296 => 
            array (
                'id' => 297,
                'egypt_governorate_id' => 19,
                'name_ar' => 'رأس البر',
                'name_en' => 'Ras El Bar',
            ),
            297 => 
            array (
                'id' => 298,
                'egypt_governorate_id' => 19,
                'name_ar' => 'فارسكور',
                'name_en' => 'Faraskour',
            ),
            298 => 
            array (
                'id' => 299,
                'egypt_governorate_id' => 19,
                'name_ar' => 'الزرقا',
                'name_en' => 'Zarqa',
            ),
            299 => 
            array (
                'id' => 300,
                'egypt_governorate_id' => 19,
                'name_ar' => 'السرو',
                'name_en' => 'alsaru',
            ),
            300 => 
            array (
                'id' => 301,
                'egypt_governorate_id' => 19,
                'name_ar' => 'الروضة',
                'name_en' => 'alruwda',
            ),
            301 => 
            array (
                'id' => 302,
                'egypt_governorate_id' => 19,
                'name_ar' => 'كفر البطيخ',
                'name_en' => 'Kafr El-Batikh',
            ),
            302 => 
            array (
                'id' => 303,
                'egypt_governorate_id' => 19,
                'name_ar' => 'عزبة البرج',
                'name_en' => 'Azbet Al Burg',
            ),
            303 => 
            array (
                'id' => 304,
                'egypt_governorate_id' => 19,
                'name_ar' => 'ميت أبو غالب',
                'name_en' => 'Meet Abou Ghalib',
            ),
            304 => 
            array (
                'id' => 305,
                'egypt_governorate_id' => 19,
                'name_ar' => 'كفر سعد',
                'name_en' => 'Kafr Saad',
            ),
            305 => 
            array (
                'id' => 306,
                'egypt_governorate_id' => 20,
                'name_ar' => 'الزقازيق',
                'name_en' => 'Zagazig',
            ),
            306 => 
            array (
                'id' => 307,
                'egypt_governorate_id' => 20,
                'name_ar' => 'العاشر من رمضان',
                'name_en' => 'Al Ashr Men Ramadan',
            ),
            307 => 
            array (
                'id' => 308,
                'egypt_governorate_id' => 20,
                'name_ar' => 'منيا القمح',
                'name_en' => 'Minya Al Qamh',
            ),
            308 => 
            array (
                'id' => 309,
                'egypt_governorate_id' => 20,
                'name_ar' => 'بلبيس',
                'name_en' => 'Belbeis',
            ),
            309 => 
            array (
                'id' => 310,
                'egypt_governorate_id' => 20,
                'name_ar' => 'مشتول السوق',
                'name_en' => 'Mashtoul El Souq',
            ),
            310 => 
            array (
                'id' => 311,
                'egypt_governorate_id' => 20,
                'name_ar' => 'القنايات',
                'name_en' => 'Qenaiat',
            ),
            311 => 
            array (
                'id' => 312,
                'egypt_governorate_id' => 20,
                'name_ar' => 'أبو حماد',
                'name_en' => 'Abu Hammad',
            ),
            312 => 
            array (
                'id' => 313,
                'egypt_governorate_id' => 20,
                'name_ar' => 'القرين',
                'name_en' => 'El Qurain',
            ),
            313 => 
            array (
                'id' => 314,
                'egypt_governorate_id' => 20,
                'name_ar' => 'ههيا',
                'name_en' => 'Hehia',
            ),
            314 => 
            array (
                'id' => 315,
                'egypt_governorate_id' => 20,
                'name_ar' => 'أبو كبير',
                'name_en' => 'Abu Kabir',
            ),
            315 => 
            array (
                'id' => 316,
                'egypt_governorate_id' => 20,
                'name_ar' => 'فاقوس',
                'name_en' => 'Faccus',
            ),
            316 => 
            array (
                'id' => 317,
                'egypt_governorate_id' => 20,
                'name_ar' => 'الصالحية الجديدة',
                'name_en' => 'El Salihia El Gedida',
            ),
            317 => 
            array (
                'id' => 318,
                'egypt_governorate_id' => 20,
                'name_ar' => 'الإبراهيمية',
                'name_en' => 'Al Ibrahimiyah',
            ),
            318 => 
            array (
                'id' => 319,
                'egypt_governorate_id' => 20,
                'name_ar' => 'ديرب نجم',
                'name_en' => 'Deirb Negm',
            ),
            319 => 
            array (
                'id' => 320,
                'egypt_governorate_id' => 20,
                'name_ar' => 'كفر صقر',
                'name_en' => 'Kafr Saqr',
            ),
            320 => 
            array (
                'id' => 321,
                'egypt_governorate_id' => 20,
                'name_ar' => 'أولاد صقر',
                'name_en' => 'Awlad Saqr',
            ),
            321 => 
            array (
                'id' => 322,
                'egypt_governorate_id' => 20,
                'name_ar' => 'الحسينية',
                'name_en' => 'Husseiniya',
            ),
            322 => 
            array (
                'id' => 323,
                'egypt_governorate_id' => 20,
                'name_ar' => 'صان الحجر القبلية',
                'name_en' => 'san alhajar alqablia',
            ),
            323 => 
            array (
                'id' => 324,
                'egypt_governorate_id' => 20,
                'name_ar' => 'منشأة أبو عمر',
                'name_en' => 'Manshayat Abu Omar',
            ),
            324 => 
            array (
                'id' => 325,
                'egypt_governorate_id' => 21,
                'name_ar' => 'الطور',
                'name_en' => 'Al Toor',
            ),
            325 => 
            array (
                'id' => 326,
                'egypt_governorate_id' => 21,
                'name_ar' => 'شرم الشيخ',
                'name_en' => 'Sharm El-Shaikh',
            ),
            326 => 
            array (
                'id' => 327,
                'egypt_governorate_id' => 21,
                'name_ar' => 'دهب',
                'name_en' => 'Dahab',
            ),
            327 => 
            array (
                'id' => 328,
                'egypt_governorate_id' => 21,
                'name_ar' => 'نويبع',
                'name_en' => 'Nuweiba',
            ),
            328 => 
            array (
                'id' => 329,
                'egypt_governorate_id' => 21,
                'name_ar' => 'طابا',
                'name_en' => 'Taba',
            ),
            329 => 
            array (
                'id' => 330,
                'egypt_governorate_id' => 21,
                'name_ar' => 'سانت كاترين',
                'name_en' => 'Saint Catherine',
            ),
            330 => 
            array (
                'id' => 331,
                'egypt_governorate_id' => 21,
                'name_ar' => 'أبو رديس',
                'name_en' => 'Abu Redis',
            ),
            331 => 
            array (
                'id' => 332,
                'egypt_governorate_id' => 21,
                'name_ar' => 'أبو زنيمة',
                'name_en' => 'Abu Zenaima',
            ),
            332 => 
            array (
                'id' => 333,
                'egypt_governorate_id' => 21,
                'name_ar' => 'رأس سدر',
                'name_en' => 'Ras Sidr',
            ),
            333 => 
            array (
                'id' => 334,
                'egypt_governorate_id' => 22,
                'name_ar' => 'كفر الشيخ',
                'name_en' => 'Kafr El Sheikh',
            ),
            334 => 
            array (
                'id' => 335,
                'egypt_governorate_id' => 22,
                'name_ar' => 'وسط البلد كفر الشيخ',
                'name_en' => 'Kafr El Sheikh Downtown',
            ),
            335 => 
            array (
                'id' => 336,
                'egypt_governorate_id' => 22,
                'name_ar' => 'دسوق',
                'name_en' => 'Desouq',
            ),
            336 => 
            array (
                'id' => 337,
                'egypt_governorate_id' => 22,
                'name_ar' => 'فوه',
                'name_en' => 'Fooh',
            ),
            337 => 
            array (
                'id' => 338,
                'egypt_governorate_id' => 22,
                'name_ar' => 'مطوبس',
                'name_en' => 'Metobas',
            ),
            338 => 
            array (
                'id' => 339,
                'egypt_governorate_id' => 22,
                'name_ar' => 'برج البرلس',
                'name_en' => 'Burg Al Burullus',
            ),
            339 => 
            array (
                'id' => 340,
                'egypt_governorate_id' => 22,
                'name_ar' => 'بلطيم',
                'name_en' => 'Baltim',
            ),
            340 => 
            array (
                'id' => 341,
                'egypt_governorate_id' => 22,
                'name_ar' => 'مصيف بلطيم',
                'name_en' => 'Masief Baltim',
            ),
            341 => 
            array (
                'id' => 342,
                'egypt_governorate_id' => 22,
                'name_ar' => 'الحامول',
                'name_en' => 'Hamol',
            ),
            342 => 
            array (
                'id' => 343,
                'egypt_governorate_id' => 22,
                'name_ar' => 'بيلا',
                'name_en' => 'Bella',
            ),
            343 => 
            array (
                'id' => 344,
                'egypt_governorate_id' => 22,
                'name_ar' => 'الرياض',
                'name_en' => 'Riyadh',
            ),
            344 => 
            array (
                'id' => 345,
                'egypt_governorate_id' => 22,
                'name_ar' => 'سيدي سالم',
                'name_en' => 'Sidi Salm',
            ),
            345 => 
            array (
                'id' => 346,
                'egypt_governorate_id' => 22,
                'name_ar' => 'قلين',
                'name_en' => 'Qellen',
            ),
            346 => 
            array (
                'id' => 347,
                'egypt_governorate_id' => 22,
                'name_ar' => 'سيدي غازي',
                'name_en' => 'Sidi Ghazi',
            ),
            347 => 
            array (
                'id' => 348,
                'egypt_governorate_id' => 23,
                'name_ar' => 'مرسى مطروح',
                'name_en' => 'Marsa Matrouh',
            ),
            348 => 
            array (
                'id' => 349,
                'egypt_governorate_id' => 23,
                'name_ar' => 'الحمام',
                'name_en' => 'El Hamam',
            ),
            349 => 
            array (
                'id' => 350,
                'egypt_governorate_id' => 23,
                'name_ar' => 'العلمين',
                'name_en' => 'Alamein',
            ),
            350 => 
            array (
                'id' => 351,
                'egypt_governorate_id' => 23,
                'name_ar' => 'الضبعة',
                'name_en' => 'Dabaa',
            ),
            351 => 
            array (
                'id' => 352,
                'egypt_governorate_id' => 23,
                'name_ar' => 'النجيلة',
                'name_en' => 'Al-Nagila',
            ),
            352 => 
            array (
                'id' => 353,
                'egypt_governorate_id' => 23,
                'name_ar' => 'سيدي براني',
                'name_en' => 'Sidi Brani',
            ),
            353 => 
            array (
                'id' => 354,
                'egypt_governorate_id' => 23,
                'name_ar' => 'السلوم',
                'name_en' => 'Salloum',
            ),
            354 => 
            array (
                'id' => 355,
                'egypt_governorate_id' => 23,
                'name_ar' => 'سيوة',
                'name_en' => 'Siwa',
            ),
            355 => 
            array (
                'id' => 356,
                'egypt_governorate_id' => 23,
                'name_ar' => 'مارينا',
                'name_en' => 'Marina',
            ),
            356 => 
            array (
                'id' => 357,
                'egypt_governorate_id' => 23,
                'name_ar' => 'الساحل الشمالى',
                'name_en' => 'North Coast',
            ),
            357 => 
            array (
                'id' => 358,
                'egypt_governorate_id' => 24,
                'name_ar' => 'الأقصر',
                'name_en' => 'Luxor',
            ),
            358 => 
            array (
                'id' => 359,
                'egypt_governorate_id' => 24,
                'name_ar' => 'الأقصر الجديدة',
                'name_en' => 'New Luxor',
            ),
            359 => 
            array (
                'id' => 360,
                'egypt_governorate_id' => 24,
                'name_ar' => 'إسنا',
                'name_en' => 'Esna',
            ),
            360 => 
            array (
                'id' => 361,
                'egypt_governorate_id' => 24,
                'name_ar' => 'طيبة الجديدة',
                'name_en' => 'New Tiba',
            ),
            361 => 
            array (
                'id' => 362,
                'egypt_governorate_id' => 24,
                'name_ar' => 'الزينية',
                'name_en' => 'Al ziynia',
            ),
            362 => 
            array (
                'id' => 363,
                'egypt_governorate_id' => 24,
                'name_ar' => 'البياضية',
                'name_en' => 'Al Bayadieh',
            ),
            363 => 
            array (
                'id' => 364,
                'egypt_governorate_id' => 24,
                'name_ar' => 'القرنة',
                'name_en' => 'Al Qarna',
            ),
            364 => 
            array (
                'id' => 365,
                'egypt_governorate_id' => 24,
                'name_ar' => 'أرمنت',
                'name_en' => 'Armant',
            ),
            365 => 
            array (
                'id' => 366,
                'egypt_governorate_id' => 24,
                'name_ar' => 'الطود',
                'name_en' => 'Al Tud',
            ),
            366 => 
            array (
                'id' => 367,
                'egypt_governorate_id' => 25,
                'name_ar' => 'قنا',
                'name_en' => 'Qena',
            ),
            367 => 
            array (
                'id' => 368,
                'egypt_governorate_id' => 25,
                'name_ar' => 'قنا الجديدة',
                'name_en' => 'New Qena',
            ),
            368 => 
            array (
                'id' => 369,
                'egypt_governorate_id' => 25,
                'name_ar' => 'ابو طشت',
                'name_en' => 'Abu Tesht',
            ),
            369 => 
            array (
                'id' => 370,
                'egypt_governorate_id' => 25,
                'name_ar' => 'نجع حمادي',
                'name_en' => 'Nag Hammadi',
            ),
            370 => 
            array (
                'id' => 371,
                'egypt_governorate_id' => 25,
                'name_ar' => 'دشنا',
                'name_en' => 'Deshna',
            ),
            371 => 
            array (
                'id' => 372,
                'egypt_governorate_id' => 25,
                'name_ar' => 'الوقف',
                'name_en' => 'Alwaqf',
            ),
            372 => 
            array (
                'id' => 373,
                'egypt_governorate_id' => 25,
                'name_ar' => 'قفط',
                'name_en' => 'Qaft',
            ),
            373 => 
            array (
                'id' => 374,
                'egypt_governorate_id' => 25,
                'name_ar' => 'نقادة',
                'name_en' => 'Naqada',
            ),
            374 => 
            array (
                'id' => 375,
                'egypt_governorate_id' => 25,
                'name_ar' => 'فرشوط',
                'name_en' => 'Farshout',
            ),
            375 => 
            array (
                'id' => 376,
                'egypt_governorate_id' => 25,
                'name_ar' => 'قوص',
                'name_en' => 'Quos',
            ),
            376 => 
            array (
                'id' => 377,
                'egypt_governorate_id' => 26,
                'name_ar' => 'العريش',
                'name_en' => 'Arish',
            ),
            377 => 
            array (
                'id' => 378,
                'egypt_governorate_id' => 26,
                'name_ar' => 'الشيخ زويد',
                'name_en' => 'Sheikh Zowaid',
            ),
            378 => 
            array (
                'id' => 379,
                'egypt_governorate_id' => 26,
                'name_ar' => 'نخل',
                'name_en' => 'Nakhl',
            ),
            379 => 
            array (
                'id' => 380,
                'egypt_governorate_id' => 26,
                'name_ar' => 'رفح',
                'name_en' => 'Rafah',
            ),
            380 => 
            array (
                'id' => 381,
                'egypt_governorate_id' => 26,
                'name_ar' => 'بئر العبد',
                'name_en' => 'Bir al-Abed',
            ),
            381 => 
            array (
                'id' => 382,
                'egypt_governorate_id' => 26,
                'name_ar' => 'الحسنة',
                'name_en' => 'Al Hasana',
            ),
            382 => 
            array (
                'id' => 383,
                'egypt_governorate_id' => 27,
                'name_ar' => 'سوهاج',
                'name_en' => 'Sohag',
            ),
            383 => 
            array (
                'id' => 384,
                'egypt_governorate_id' => 27,
                'name_ar' => 'سوهاج الجديدة',
                'name_en' => 'Sohag El Gedida',
            ),
            384 => 
            array (
                'id' => 385,
                'egypt_governorate_id' => 27,
                'name_ar' => 'أخميم',
                'name_en' => 'Akhmeem',
            ),
            385 => 
            array (
                'id' => 386,
                'egypt_governorate_id' => 27,
                'name_ar' => 'أخميم الجديدة',
                'name_en' => 'Akhmim El Gedida',
            ),
            386 => 
            array (
                'id' => 387,
                'egypt_governorate_id' => 27,
                'name_ar' => 'البلينا',
                'name_en' => 'Albalina',
            ),
            387 => 
            array (
                'id' => 388,
                'egypt_governorate_id' => 27,
                'name_ar' => 'المراغة',
                'name_en' => 'El Maragha',
            ),
            388 => 
            array (
                'id' => 389,
                'egypt_governorate_id' => 27,
                'name_ar' => 'المنشأة',
                'name_en' => 'almunsha\'a',
            ),
            389 => 
            array (
                'id' => 390,
                'egypt_governorate_id' => 27,
                'name_ar' => 'دار السلام',
                'name_en' => 'Dar AISalaam',
            ),
            390 => 
            array (
                'id' => 391,
                'egypt_governorate_id' => 27,
                'name_ar' => 'جرجا',
                'name_en' => 'Gerga',
            ),
            391 => 
            array (
                'id' => 392,
                'egypt_governorate_id' => 27,
                'name_ar' => 'جهينة الغربية',
                'name_en' => 'Jahina Al Gharbia',
            ),
            392 => 
            array (
                'id' => 393,
                'egypt_governorate_id' => 27,
                'name_ar' => 'ساقلته',
                'name_en' => 'Saqilatuh',
            ),
            393 => 
            array (
                'id' => 394,
                'egypt_governorate_id' => 27,
                'name_ar' => 'طما',
                'name_en' => 'Tama',
            ),
            394 => 
            array (
                'id' => 395,
                'egypt_governorate_id' => 27,
                'name_ar' => 'طهطا',
                'name_en' => 'Tahta',
            ),
            395 => 
            array (
                'id' => 396,
                'egypt_governorate_id' => 27,
                'name_ar' => 'الكوثر',
                'name_en' => 'Alkawthar',
            ),
        ));
        
        
    }
}