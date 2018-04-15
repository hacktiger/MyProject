<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\games;
use App\User;

class GenreController extends Controller
{
    //

    public function allGames(){
    	$game =  games::orderBy('created_at','DESC')->paginate(8);


    	return view('allGames',['game'=>$game]);
    }
}
