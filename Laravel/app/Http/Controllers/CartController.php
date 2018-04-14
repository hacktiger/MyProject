<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\games;

class CartController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	//add game:$id to DB:sales_log
	//if (game already in cart){
		//return message: already in cart
	//	}
	public function addToCart($title)
	{
		$game=games::find($title);
		sales_log::insert('Add to cart game ',[$title]);
		return view('games.show')->with ('success','Game Added to Cart');
	}
	
	//remove game:$id from DB:sales_log
	public function remove($id)
	{
		
	}
	
	//remove all games with $user_id from DB:sales_log and add to DB:owned_games 
	public function purchase()
	{
		
	}
}