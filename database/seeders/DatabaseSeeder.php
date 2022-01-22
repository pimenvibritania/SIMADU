<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AgamaSeeder::class,
            JenisPasporSeeder::class,
            JenjangSeeder::class,
            AIdTerritoryTableSeeder::class,
            EgyptGovernoratesTableSeeder::class,
            EgyptCitiesTableSeeder::class,
            InstitutesTableSeeder::class
        ]);
    }
}
