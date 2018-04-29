<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


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
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'wallet' => mt_rand (1000,9999)/100,

            ]);

        }


        

        for($i = 0;$i<20;$i++){
            $date = Carbon::create(2018, 4, 30, 0, 0, 0);
            DB::table('sales_log')->insert([
                
                'game_title'=> 'Counter-Strike : Global Offensive',
                'user_id'=> mt_rand(1,50),
                'price' => 40.00,
                'created_at'  => $date->subDays(rand(1,6))->format('Y-m-d H:i:s')
            ]);

            DB::table('sales_log')->insert([
                
                'game_title'=> 'StarCraft 2 : Legacy of the Void',
                'user_id'=> mt_rand(1,50),
                'price' => 35.00,
                'created_at'  => $date->subDays(rand(1,6))->format('Y-m-d H:i:s')
            ]);

            DB::table('sales_log')->insert([
                
                'game_title'=> 'Nier: Automata',
                'user_id'=> mt_rand(1,50),
                'price'=>60.00,
                'created_at'  => $date->subDays(rand(1,6))->format('Y-m-d H:i:s')
            ]);

        }              
   }
}
