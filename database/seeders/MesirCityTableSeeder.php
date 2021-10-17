<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MesirCityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mesir_city')->delete();
        
        \DB::table('mesir_city')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mesir_prov_id' => 1,
                'city_name' => 'Nasr City',
            ),
            1 => 
            array (
                'id' => 2,
                'mesir_prov_id' => 1,
                'city_name' => 'Abbaseah',
            ),
            2 => 
            array (
                'id' => 3,
                'mesir_prov_id' => 1,
                'city_name' => 'Ramses',
            ),
            3 => 
            array (
                'id' => 4,
                'mesir_prov_id' => 1,
                'city_name' => 'Tahrir',
            ),
            4 => 
            array (
                'id' => 5,
                'mesir_prov_id' => 1,
                'city_name' => 'Katameya',
            ),
            5 => 
            array (
                'id' => 6,
                'mesir_prov_id' => 1,
                'city_name' => 'Heliopolis',
            ),
            6 => 
            array (
                'id' => 7,
                'mesir_prov_id' => 29,
                'city_name' => 'Helwan',
            ),
            7 => 
            array (
                'id' => 8,
                'mesir_prov_id' => 3,
                'city_name' => 'Dokki',
            ),
            8 => 
            array (
                'id' => 9,
                'mesir_prov_id' => 3,
                'city_name' => 'Mohandesin',
            ),
            9 => 
            array (
                'id' => 10,
                'mesir_prov_id' => 1,
                'city_name' => 'Zamalek',
            ),
            10 => 
            array (
                'id' => 11,
                'mesir_prov_id' => 1,
                'city_name' => 'Al Salam City',
            ),
            11 => 
            array (
                'id' => 12,
                'mesir_prov_id' => 1,
                'city_name' => 'Cairo',
            ),
            12 => 
            array (
                'id' => 13,
                'mesir_prov_id' => 1,
                'city_name' => 'New Cairo',
            ),
            13 => 
            array (
                'id' => 14,
                'mesir_prov_id' => 10,
                'city_name' => 'Tanta',
            ),
            14 => 
            array (
                'id' => 15,
                'mesir_prov_id' => 10,
                'city_name' => 'Mit Ghamr',
            ),
            15 => 
            array (
                'id' => 16,
                'mesir_prov_id' => 6,
                'city_name' => 'Mansoura',
            ),
            16 => 
            array (
                'id' => 17,
                'mesir_prov_id' => 12,
                'city_name' => 'Zagazig',
            ),
            17 => 
            array (
                'id' => 18,
                'mesir_prov_id' => 2,
                'city_name' => 'Alexandria',
            ),
            18 => 
            array (
                'id' => 19,
                'mesir_prov_id' => 1,
                'city_name' => 'Garden City',
            ),
            19 => 
            array (
                'id' => 20,
                'mesir_prov_id' => 3,
                'city_name' => 'Boulak Dakrour',
            ),
            20 => 
            array (
                'id' => 21,
                'mesir_prov_id' => 1,
                'city_name' => 'Maadi',
            ),
            21 => 
            array (
                'id' => 22,
                'mesir_prov_id' => 23,
                'city_name' => 'Damietta',
            ),
            22 => 
            array (
                'id' => 23,
                'mesir_prov_id' => 28,
                'city_name' => 'Hurghada',
            ),
            23 => 
            array (
                'id' => 24,
                'mesir_prov_id' => 3,
                'city_name' => 'Giza',
            ),
            24 => 
            array (
                'id' => 25,
                'mesir_prov_id' => 26,
                'city_name' => 'Safaga',
            ),
            25 => 
            array (
                'id' => 26,
                'mesir_prov_id' => 28,
                'city_name' => 'Sharm El Sheikh',
            ),
            26 => 
            array (
                'id' => 27,
                'mesir_prov_id' => 4,
                'city_name' => 'Dasuk',
            ),
            27 => 
            array (
                'id' => 28,
                'mesir_prov_id' => 8,
                'city_name' => 'Damanhur',
            ),
            28 => 
            array (
                'id' => 29,
                'mesir_prov_id' => 1,
                'city_name' => 'Hadayek Qubba',
            ),
            29 => 
            array (
                'id' => 30,
                'mesir_prov_id' => 1,
                'city_name' => 'Darrasah',
            ),
            30 => 
            array (
                'id' => 31,
                'mesir_prov_id' => 6,
                'city_name' => 'Mit Ghamr',
            ),
            31 => 
            array (
                'id' => 32,
                'mesir_prov_id' => 1,
                'city_name' => 'Jamaliyah',
            ),
            32 => 
            array (
                'id' => 33,
                'mesir_prov_id' => 1,
                'city_name' => 'Katameya',
            ),
            33 => 
            array (
                'id' => 34,
                'mesir_prov_id' => 3,
                'city_name' => '6th October',
            ),
            34 => 
            array (
                'id' => 35,
                'mesir_prov_id' => 20,
                'city_name' => 'Markaz Nagada',
            ),
            35 => 
            array (
                'id' => 36,
                'mesir_prov_id' => 2,
                'city_name' => 'Al Asafira',
            ),
            36 => 
            array (
                'id' => 37,
                'mesir_prov_id' => 1,
                'city_name' => 'Shubra',
            ),
            37 => 
            array (
                'id' => 38,
                'mesir_prov_id' => 2,
                'city_name' => 'Sidi Gaber',
            ),
            38 => 
            array (
                'id' => 39,
                'mesir_prov_id' => 3,
                'city_name' => 'Al Haram',
            ),
            39 => 
            array (
                'id' => 40,
                'mesir_prov_id' => 1,
                'city_name' => 'Mukatam',
            ),
            40 => 
            array (
                'id' => 41,
                'mesir_prov_id' => 6,
                'city_name' => 'Markaz Sherbin',
            ),
            41 => 
            array (
                'id' => 42,
                'mesir_prov_id' => 2,
                'city_name' => 'Al Raml',
            ),
            42 => 
            array (
                'id' => 43,
                'mesir_prov_id' => 21,
                'city_name' => 'New Karnak',
            ),
            43 => 
            array (
                'id' => 44,
                'mesir_prov_id' => 9,
                'city_name' => 'Markaz Quesna',
            ),
            44 => 
            array (
                'id' => 45,
                'mesir_prov_id' => 11,
                'city_name' => 'Obour City',
            ),
            45 => 
            array (
                'id' => 46,
                'mesir_prov_id' => 1,
                'city_name' => 'Old Cairo',
            ),
            46 => 
            array (
                'id' => 47,
                'mesir_prov_id' => 3,
                'city_name' => 'Ard Al Liwa',
            ),
            47 => 
            array (
                'id' => 48,
                'mesir_prov_id' => 2,
                'city_name' => 'Al Dakhelah',
            ),
            48 => 
            array (
                'id' => 49,
                'mesir_prov_id' => 11,
                'city_name' => 'Qaha',
            ),
            49 => 
            array (
                'id' => 50,
                'mesir_prov_id' => 9,
                'city_name' => 'Al Sadat City',
            ),
            50 => 
            array (
                'id' => 51,
                'mesir_prov_id' => 21,
                'city_name' => 'Markaz Esna',
            ),
            51 => 
            array (
                'id' => 52,
                'mesir_prov_id' => 1,
                'city_name' => 'Sayedah Zeinab',
            ),
            52 => 
            array (
                'id' => 53,
                'mesir_prov_id' => 3,
                'city_name' => 'Al Haram',
            ),
            53 => 
            array (
                'id' => 54,
                'mesir_prov_id' => 1,
                'city_name' => 'Hussein',
            ),
            54 => 
            array (
                'id' => 55,
                'mesir_prov_id' => 2,
                'city_name' => 'Bab Shark',
            ),
            55 => 
            array (
                'id' => 56,
                'mesir_prov_id' => 1,
                'city_name' => 'Matareya',
            ),
            56 => 
            array (
                'id' => 57,
                'mesir_prov_id' => 2,
                'city_name' => 'Kamsizar',
            ),
            57 => 
            array (
                'id' => 58,
                'mesir_prov_id' => 1,
                'city_name' => 'Ain Shams',
            ),
            58 => 
            array (
                'id' => 59,
                'mesir_prov_id' => 2,
                'city_name' => 'Borg Al Arab',
            ),
            59 => 
            array (
                'id' => 60,
                'mesir_prov_id' => 3,
                'city_name' => 'Corniche Nile',
            ),
            60 => 
            array (
                'id' => 61,
                'mesir_prov_id' => 10,
                'city_name' => 'Aga',
            ),
            61 => 
            array (
                'id' => 62,
                'mesir_prov_id' => 11,
                'city_name' => 'Banha',
            ),
            62 => 
            array (
                'id' => 63,
                'mesir_prov_id' => 1,
                'city_name' => 'Nouzha',
            ),
            63 => 
            array (
                'id' => 64,
                'mesir_prov_id' => 2,
                'city_name' => 'Miami',
            ),
            64 => 
            array (
                'id' => 65,
                'mesir_prov_id' => 1,
                'city_name' => 'Sayeda Aisha',
            ),
            65 => 
            array (
                'id' => 66,
                'mesir_prov_id' => 12,
                'city_name' => 'Ismailiya Road',
            ),
            66 => 
            array (
                'id' => 67,
                'mesir_prov_id' => 1,
                'city_name' => 'Darb Al Ahmar',
            ),
            67 => 
            array (
                'id' => 68,
                'mesir_prov_id' => 3,
                'city_name' => 'Sheikh Zayed',
            ),
            68 => 
            array (
                'id' => 69,
                'mesir_prov_id' => 12,
                'city_name' => '10th Ramadan',
            ),
            69 => 
            array (
                'id' => 70,
                'mesir_prov_id' => 23,
                'city_name' => 'Ras Al Bar',
            ),
            70 => 
            array (
                'id' => 71,
                'mesir_prov_id' => 20,
                'city_name' => 'Nag Hammadi',
            ),
            71 => 
            array (
                'id' => 72,
                'mesir_prov_id' => 1,
                'city_name' => 'Shoubra',
            ),
            72 => 
            array (
                'id' => 73,
                'mesir_prov_id' => 1,
                'city_name' => 'Gamra',
            ),
            73 => 
            array (
                'id' => 74,
                'mesir_prov_id' => 1,
                'city_name' => 'Bab Al Sharia',
            ),
            74 => 
            array (
                'id' => 75,
                'mesir_prov_id' => 1,
                'city_name' => 'Zeitoun',
            ),
            75 => 
            array (
                'id' => 76,
                'mesir_prov_id' => 3,
                'city_name' => 'Imbaba',
            ),
            76 => 
            array (
                'id' => 77,
                'mesir_prov_id' => 6,
                'city_name' => 'Markaz Naberu',
            ),
            77 => 
            array (
                'id' => 78,
                'mesir_prov_id' => 9,
                'city_name' => 'Markaz Shohada',
            ),
            78 => 
            array (
                'id' => 79,
                'mesir_prov_id' => 3,
                'city_name' => 'Agouza',
            ),
            79 => 
            array (
                'id' => 80,
                'mesir_prov_id' => 1,
                'city_name' => 'Zaitun',
            ),
            80 => 
            array (
                'id' => 81,
                'mesir_prov_id' => 2,
                'city_name' => 'Montaza',
            ),
            81 => 
            array (
                'id' => 82,
                'mesir_prov_id' => 3,
                'city_name' => 'Omraneya',
            ),
            82 => 
            array (
                'id' => 83,
                'mesir_prov_id' => 17,
                'city_name' => 'Markaz Dermawaz',
            ),
            83 => 
            array (
                'id' => 84,
                'mesir_prov_id' => 3,
                'city_name' => 'Mansoria',
            ),
            84 => 
            array (
                'id' => 85,
                'mesir_prov_id' => 13,
                'city_name' => 'Jabalia',
            ),
            85 => 
            array (
                'id' => 86,
                'mesir_prov_id' => 3,
                'city_name' => 'Gezira Al Dahab',
            ),
            86 => 
            array (
                'id' => 87,
                'mesir_prov_id' => 1,
                'city_name' => 'Badar City',
            ),
            87 => 
            array (
                'id' => 88,
                'mesir_prov_id' => 1,
                'city_name' => 'Al Menial',
            ),
            88 => 
            array (
                'id' => 89,
                'mesir_prov_id' => 1,
                'city_name' => 'Al Waily',
            ),
            89 => 
            array (
                'id' => 90,
                'mesir_prov_id' => 2,
                'city_name' => 'San Stefano',
            ),
            90 => 
            array (
                'id' => 91,
                'mesir_prov_id' => 2,
                'city_name' => 'Mandara',
            ),
            91 => 
            array (
                'id' => 92,
                'mesir_prov_id' => 2,
                'city_name' => 'Second Al Raml',
            ),
            92 => 
            array (
                'id' => 93,
                'mesir_prov_id' => 12,
                'city_name' => 'Markaz Fakus',
            ),
            93 => 
            array (
                'id' => 94,
                'mesir_prov_id' => 1,
                'city_name' => 'Dar Al Salam',
            ),
            94 => 
            array (
                'id' => 95,
                'mesir_prov_id' => 26,
                'city_name' => 'Marsa Alam',
            ),
            95 => 
            array (
                'id' => 96,
                'mesir_prov_id' => 1,
                'city_name' => 'New Al Marag',
            ),
            96 => 
            array (
                'id' => 97,
                'mesir_prov_id' => 10,
                'city_name' => 'Markaz Kotour',
            ),
            97 => 
            array (
                'id' => 98,
                'mesir_prov_id' => 12,
                'city_name' => 'Markaz Hehiya',
            ),
            98 => 
            array (
                'id' => 99,
                'mesir_prov_id' => 1,
                'city_name' => 'Kasr Al Aini',
            ),
            99 => 
            array (
                'id' => 100,
                'mesir_prov_id' => 2,
                'city_name' => 'Al Agamy',
            ),
            100 => 
            array (
                'id' => 101,
                'mesir_prov_id' => 3,
                'city_name' => 'Faisal',
            ),
            101 => 
            array (
                'id' => 102,
                'mesir_prov_id' => 2,
                'city_name' => 'Gomrok',
            ),
            102 => 
            array (
                'id' => 103,
                'mesir_prov_id' => 10,
                'city_name' => 'Markaz Qotour',
            ),
            103 => 
            array (
                'id' => 104,
                'mesir_prov_id' => 9,
                'city_name' => 'Shebeen Khoum',
            ),
            104 => 
            array (
                'id' => 105,
                'mesir_prov_id' => 1,
                'city_name' => 'Rehab City',
            ),
            105 => 
            array (
                'id' => 106,
                'mesir_prov_id' => 14,
                'city_name' => 'Bank Al Eskan District',
            ),
            106 => 
            array (
                'id' => 107,
                'mesir_prov_id' => 15,
                'city_name' => 'Markaz Abshawai',
            ),
            107 => 
            array (
                'id' => 108,
                'mesir_prov_id' => 6,
                'city_name' => 'Markaz Monia Al Nasr',
            ),
            108 => 
            array (
                'id' => 109,
                'mesir_prov_id' => 10,
                'city_name' => 'El Mahala El Kubra',
            ),
            109 => 
            array (
                'id' => 110,
                'mesir_prov_id' => 1,
                'city_name' => 'Damardash',
            ),
            110 => 
            array (
                'id' => 111,
                'mesir_prov_id' => 2,
                'city_name' => 'Samoha',
            ),
            111 => 
            array (
                'id' => 112,
                'mesir_prov_id' => 26,
                'city_name' => 'El Gouna',
            ),
            112 => 
            array (
                'id' => 113,
                'mesir_prov_id' => 1,
                'city_name' => 'Helmiyet Zaitun',
            ),
            113 => 
            array (
                'id' => 114,
                'mesir_prov_id' => 3,
                'city_name' => 'El Haram',
            ),
            114 => 
            array (
                'id' => 115,
                'mesir_prov_id' => 20,
                'city_name' => 'Markaz Qus',
            ),
            115 => 
            array (
                'id' => 116,
                'mesir_prov_id' => 18,
                'city_name' => 'First Assiut',
            ),
            116 => 
            array (
                'id' => 117,
                'mesir_prov_id' => 3,
                'city_name' => 'Markaz Badrosin',
            ),
            117 => 
            array (
                'id' => 118,
                'mesir_prov_id' => 23,
                'city_name' => 'New Damietta',
            ),
            118 => 
            array (
                'id' => 119,
                'mesir_prov_id' => 24,
                'city_name' => '5th District',
            ),
            119 => 
            array (
                'id' => 120,
                'mesir_prov_id' => 2,
                'city_name' => 'Sidi Bishr',
            ),
            120 => 
            array (
                'id' => 121,
                'mesir_prov_id' => 15,
                'city_name' => 'Markaz Yousef Al Sidik',
            ),
            121 => 
            array (
                'id' => 122,
                'mesir_prov_id' => 2,
                'city_name' => 'Smoha',
            ),
            122 => 
            array (
                'id' => 123,
                'mesir_prov_id' => 16,
                'city_name' => 'Horreya',
            ),
            123 => 
            array (
                'id' => 124,
                'mesir_prov_id' => 6,
                'city_name' => 'Menya',
            ),
            124 => 
            array (
                'id' => 125,
                'mesir_prov_id' => 6,
                'city_name' => 'Samanud',
            ),
            125 => 
            array (
                'id' => 126,
                'mesir_prov_id' => 3,
                'city_name' => 'Markaz Abou Namrouz',
            ),
            126 => 
            array (
                'id' => 127,
                'mesir_prov_id' => 1,
                'city_name' => 'As Salam City',
            ),
            127 => 
            array (
                'id' => 128,
                'mesir_prov_id' => 20,
                'city_name' => 'Markaz Nage Hamady',
            ),
            128 => 
            array (
                'id' => 129,
                'mesir_prov_id' => 5,
                'city_name' => 'Markaz Bella',
            ),
            129 => 
            array (
                'id' => 130,
                'mesir_prov_id' => 28,
                'city_name' => 'Nuwaiba',
            ),
            130 => 
            array (
                'id' => 131,
                'mesir_prov_id' => 1,
                'city_name' => 'Deir Malak',
            ),
            131 => 
            array (
                'id' => 132,
                'mesir_prov_id' => 12,
                'city_name' => 'Bilbies',
            ),
            132 => 
            array (
                'id' => 133,
                'mesir_prov_id' => 2,
                'city_name' => 'Moharem Bek',
            ),
            133 => 
            array (
                'id' => 134,
                'mesir_prov_id' => 15,
                'city_name' => 'Markaz Athsa',
            ),
            134 => 
            array (
                'id' => 135,
                'mesir_prov_id' => 3,
                'city_name' => 'Moneb',
            ),
        ));
        
        
    }
}