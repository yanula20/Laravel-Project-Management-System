<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\User');

        for($i = 1; $i <= 100; $i++) {

	        DB::table('users')->insert([
	        	'name' => $faker->firstName,
	            'email' =>  $faker->email,
	            'password' => $faker->password,
	            'first_name' => $faker->firstName,
	            'middle_name' => $faker->firstName,
	            'last_name' =>  $faker->lastName,
	            'city' => $faker->city,
	            'created_at' => \Carbon\Carbon::now(),
	            'updated_at' => \Carbon\Carbon::now(), 

	        ]);	
        }
    }
}

	
