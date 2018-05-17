<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $date = Carbon::create(2018, 4, 30, 0, 0, 0);
        //MAKE USERS
        for($i = 0;$i<500;$i++){
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'wallet' => mt_rand (1000,99999)/100,
                'description' => str_random(100),
                'created_at' => $date->format('Y-m-d H:i:s'),

            ]);

        }
        // MAKE GAMES
        for($i = 0; $i<200; $i++){
            DB::table('games')->insert([
                'title'=> 'sample game'.$i,
                'slug'=> 'sample-game'.$i,
                'description' => 'none',
                'release' => 1998,
                'link' => 'none',
                'upload_by' => 'admin',
                'price' => mt_rand(1000,6000)/100,
                'sales' => 0,
                'created_at' => $date->subDays(rand(1,30))->format('Y-m-d H:i:s'),
                'updated_at' => $date->addDays(rand(1,10))->format('Y-m-d H:i:s'),
                'approved'=> 'Y',
            ]);
        }
        // MAKE TAGS
        for($i = 0; $i<15;$i++ ){
            DB::table('tags')->insert([
                'name'=>str_random(20),
                'created_at' => $date->subDays(rand(1,30))->format('Y-m-d H:i:s'),
            ]);
        }
        


        // sales_log /rating /favorite
        $games = DB::table('games')->select('title','price')->get();
        foreach ($games as $game) {
            DB::table('sales_log')->insert([
                'game_title' => $game->title,
                'user_id' => mt_rand(1,499),
                'price' => $game->price,
                'created_at'  => $date->subDays(rand(1,30))->format('Y-m-d H:i:s'),
            ]);
            //games_tags
            DB::table('games_tags')->insert([
                'games_title'=>$game->title,
                'tags_id'=>mt_rand(1,15),
            ]);

            DB::table('rating')->insert([
                'game_title' => $game->title,
                'user_id' => mt_rand(1,150),
                'rating' => mt_rand(1,2),
            ]);

            DB::table('rating')->insert([
                'game_title' => $game->title,
                'user_id' => mt_rand(160,320),
                'rating' => mt_rand(3,5),
            ]);

            DB::table('rating')->insert([
                'game_title' => $game->title,
                'user_id' => mt_rand(330,499),
                'rating' => mt_rand(1,5),
            ]);

            DB::table('report')->insert([
                'game_title' => $game->title,
                'upload_by' => mt_rand(330,499),
                'text' => str_random(200),
            ]);
            DB::table('report')->insert([
                'game_title' => $game->title,
                'upload_by' => mt_rand(1,200),
                'text' => str_random(200),
            ]);
            DB::table('report')->insert([
                'game_title' => $game->title,
                'upload_by' => mt_rand(201,320),
                'text' => str_random(200),
            ]);
        }    

        for($i=0; $i<500;$i++){
            DB::table('wallet_history')->insert([
                'user_id'=>mt_rand(1,500),
                'amount'=>mt_rand(1000,3000)/100,
                'created_at'=>$date->subDays(rand(1,30))->format('Y-m-d H:i:s'),
            ]);
        }     
    }
}
