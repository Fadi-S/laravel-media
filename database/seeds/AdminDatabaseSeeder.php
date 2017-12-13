<?php

use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::insert(['display_name'=>"Administrator", 'name'=>'admin',
            'password'=>bcrypt('123456'), "created_at"=>Carbon\Carbon::now(), "updated_at"=>Carbon\Carbon::now()]);
    }
}
