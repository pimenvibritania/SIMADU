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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'status' => 'admin'
        ]);

        $admin->assignRole('admin');

        $tki = User::create([
            'name' => 'tki',
            'email' => 'tki@mail.com',
            'password' => bcrypt('password'),
            'status' => 'tki'
        ]);

        $tki->assignRole('tki');

        $mahasiswa = User::create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('password'),
            'status' => 'mahasiswa'
        ]);

        $mahasiswa->assignRole('mahasiswa');

        $adm_kons = User::create([
              'name' => 'admin konsuler',
              'email' => 'adminkonsuler@mail.com',
              'password' => bcrypt('password'),
              'status' => 'admin_konsuler'
          ]);

        $adm_kons->assignRole('admin_konsuler');

        $adm_mah = User::create([
              'name' => 'admin mahasiswa',
              'email' => 'adminmahasiswa@mail.com',
              'password' => bcrypt('password'),
              'status' => 'admin_mahasiswa'
          ]);

        $adm_mah->assignRole('admin_mahasiswa');

        $pim = User::create([
            'name' => 'pimpinan',
            'email' => 'pimpinan@mail.com',
            'password' => bcrypt('password'),
            'status' => 'pimpinan'
        ]);

        $pim->assignRole('pimpinan');
    }
}
