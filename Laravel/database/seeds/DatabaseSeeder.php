<?php

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
    	for($i = 0;$i<150;$i++){
    		// $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
    		'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),	

        ]);

        DB::table('games')->insert([
        	'title' => str_random(10),
        	'description' => str_random(300),
        	'link' => str_random(10),
        	'image' => str_random(10),
        	'upload_by' => rand(1,50),

        ]);
     
    	}
        
    }
}
