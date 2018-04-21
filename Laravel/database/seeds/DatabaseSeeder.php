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
        /**
        for($i = 0;$i<50;$i++){
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'wallet' => mt_rand (1000,9999)/100,

            ]);

        }

    	for($i = 0;$i<50;$i++){
        // $this->call(UsersTableSeeder::class);
            DB::table('rating')->insert([
                'game_title' => 'Nier: Automata',
                'user_id'=> $i+1,
                'rating'=>  mt_rand (0,5),
            ]);

            DB::table('rating')->insert([
                'game_title' => 'Age of Empire',
                'user_id'=> $i+1,
                'rating'=>  mt_rand (0,5),
            ]);

            DB::table('rating')->insert([
                'game_title' => 'BioShock : Infinite',
                'user_id'=> $i+1,
                'rating'=>  mt_rand (0,5),
            ]);   

            DB::table('rating')->insert([
                'game_title' => 'BlazeBlue : Central Fiction',
                'user_id'=> $i+1,
                'rating'=>  mt_rand (0,5),
            ]);
        } 
        **/

        for($i = 0;$i<20;$i++){
            DB::table('sales_log')->insert([
                
                'game_title'=> 'Counter-Strike : Global Offensive',
                'user_id'=> mt_rand(1,50),
            ]);

            DB::table('sales_log')->insert([
                
                'game_title'=> 'StarCraft 2 : Legacy of the Void',
                'user_id'=> mt_rand(1,50),
            ]);

            DB::table('sales_log')->insert([
                
                'game_title'=> 'Nier: Automata',
                'user_id'=> mt_rand(1,50),
            ]);

        }              
   }
}
