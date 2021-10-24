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
            JenisPasporSeeder::class
        ]);
        $this->call(AIdTerritoryTableSeeder::class);
        $this->call(EgyptGovernoratesTableSeeder::class);
        $this->call(EgyptCitiesTableSeeder::class);
    }
}
