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
   }
}
