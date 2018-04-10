<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function report()
    {
        
        return Redirect::back()->with('success','Game Reported !');
    }
	
	public function search()
	{
		
		return view('search');
	}
	
	public function gameBase()
	{
		return view('allGames');
	}
	
	public function devBase()
	{
		return view('devList');
	}
}
