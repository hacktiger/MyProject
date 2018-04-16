<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use App\rating;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	//search by title
	public function normalSearch(Request $request)
	{
		$nameQuery = Request::input('search');
		$results = DB::select('SELECT * FROM games WHERE title= %"$nameQuery"%')->paginate(3);
		return view('search.search', compact('results','nameQuery'));
	}
	//advance search
	public function advanceSearch(Request $request)
	{

	}
}