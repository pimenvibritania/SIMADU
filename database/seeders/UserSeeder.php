<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@mail.com',
            ],
            [
                'name' => 'admin',
                'password' => bcrypt('password'),
                'status' => 'admin'
            ]
        );

        $admin->assignRole('admin');

        $tki = User::firstOrCreate(
            [
                'email' => 'tki@mail.com',
            ],
            [
            'name' => 'tki',
            'password' => bcrypt('password'),
            'status' => 'tki'
        ]);

        $tki->assignRole('tki');

        $mahasiswa = User::firstOrCreate(
            [
                'email' => 'mahasiswa@mail.com',
            ],
            [
            'name' => 'mahasiswa',
            'password' => bcrypt('password'),
            'status' => 'mahasiswa'
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $adm_kons = User::firstOrCreate(
            [
                'email' => 'adminkonsuler@mail.com',
            ],
            [
              'name' => 'admin konsuler',
              'password' => bcrypt('password'),
              'status' => 'admin_konsuler'
          ]);

        $adm_kons->assignRole('admin_konsuler');

        $adm_mah = User::firstOrCreate(
            [
                'email' => 'adminmahasiswa@mail.com',
            ],
            [
              'name' => 'admin mahasiswa',
              'password' => bcrypt('password'),
              'status' => 'admin_mahasiswa'
          ]);

        $adm_mah->assignRole('admin_mahasiswa');

        $pim = User::firstOrCreate(
            [
                'email' => 'pimpinan@mail.com',
            ],
            [
            'name' => 'pimpinan',
            'password' => bcrypt('password'),
            'status' => 'pimpinan'
        ]);

        $pim->assignRole('pimpinan');
    }
}
