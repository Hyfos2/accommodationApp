<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Brian',
        	'surname'=>'Thomas',
        	'email'=>'bthighforce@gmail.com',
        	'password'=>bcrypt('zimbabwean'),
        	'title'=>'Mr.',
        	'userTypeId'=>1
        	]);
    }
}
