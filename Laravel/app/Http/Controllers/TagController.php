<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;

class TagController extends Controller
{
    //
    public function showAdventure(){
    	$Adventure = DB::select("
    			SELECT 
    				title 
    			FROM 
    				games 
    			WHERE 
    				Adventure = '1'
    		");
    
    	return view('games.Adventure',['Adventure'=>$Adventure]);
    }
}
