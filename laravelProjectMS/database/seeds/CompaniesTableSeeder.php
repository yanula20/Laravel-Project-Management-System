<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Company');



        for($i=1; $i <= 30; $i++) {

        	DB::table('companies')->insert([


        		'name' => $faker->company,
        		'description' => $faker->catchPhrase,
        		'user_id' => User::all()->random()->id,
        		'created_at' => \Carbon\Carbon::now(),
        		'updated_at' => \Carbon\Carbon::now(),
        	]);
        }
    }
}
