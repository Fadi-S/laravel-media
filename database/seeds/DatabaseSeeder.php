<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleDatabaseSeeder::class);
        $this->call(AdminDatabaseSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
