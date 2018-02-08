<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(UserTypesSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
