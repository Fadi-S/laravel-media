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
        \App\Admin::create(['display_name'=>"Administrator", 'name'=>'admin', 'role_id'=>\App\Role::first()->id,
            'email'=>'admin@stgtube.com', 'phone'=>'01111111111', 'password'=>'123456']);
    }
}
