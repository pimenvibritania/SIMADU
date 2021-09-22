<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'mahasiswa',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_mahasiswa',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_konsuler',
            'guard_name' => 'web'
         ]);

        Role::create([
             'name' => 'pimpinan',
             'guard_name' => 'web'
         ]);
    }
}
