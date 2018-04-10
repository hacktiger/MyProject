<?php
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
		$this->middleware('auth')->(['index','show']);
	}
	
	public function normalSearch(Request $request)
	{
		$nameQuery =$request-> input('text');
		DB::table ('games')->select([
		'title' => $nameQuery,
		]);
		return redirect('/games/'$nameQuery);
	}