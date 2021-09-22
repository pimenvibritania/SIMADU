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

        $mahasiswa = User::create([
              'name' => 'admin konsuler',
              'email' => 'adminkonsuler@mail.com',
              'password' => bcrypt('password'),
              'status' => 'admin_konsuler'
          ]);

        $mahasiswa->assignRole('admin_konsuler');

        $mahasiswa = User::create([
              'name' => 'admin mahasiswa',
              'email' => 'adminmahasiswa@mail.com',
              'password' => bcrypt('password'),
              'status' => 'admin_mahasiswa'
          ]);

        $mahasiswa->assignRole('admin_mahasiswa');
    }
}
