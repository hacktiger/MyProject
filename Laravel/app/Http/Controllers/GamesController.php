<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;


class GamesController extends Controller
{

    /**
    * Enforce middleware.
    */
    public function __construct()
    {
        $this->middleware('auth')->only(['index','show']);

        $this->middleware('admin')->except(['index','show', 'edit', 'update']);
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // get game detail
        $game =  games::orderBy('created_at','DESC')->paginate(9);
        // get sales num
        $sales = DB::table('games')->where('sales', '<>', 0)
                ->orderBy('created_at','DESC')
                ->take(3)->get();
        //notification
        $notification = DB::table('notification')->orderBy('id','DESC')->paginate(3);
        //return
        return view('index',['game'=>$game, 'sales'=>$sales, 'notification'=>$notification ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        // ------ //
        //  MAIN  //
        // -------//
        //get all tags
        $tags = Tags::all();
        //return to create game
        return view('games.create',[
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,
            'tags'=>$tags,
        ]);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data validation
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'link' => 'required',
            'image'=>'image|nullable|max:5999',
            'price'=>'required',
            'upload_by' => 'required',
            'release' => 'required'

        ]);
        //Handle File Upload
        if($request->hasFile('image')){
            //with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }  else {
            $fileNameToStore = 'khongCoImage.jpg';
        }

        //Create games info
        $games = new games([
            'title' => $request->input('title'),
        ]);
        $games->description = $request->input('description');
        $games->link = $request->input('link');
        $games->image = $fileNameToStore;
        $games->upload_by = $request->input('upload_by');
        $games->release = $request->input('release');
        $games->price = $request->input('price');
        $games->sales = $request->input('sales');
        $games->save();
        // Adding the tags
        $games->title=$request->input('title');
        $game_tag_id = $request->input('tags');
        if($game_tag_id)
            for($i = 0; $i<count($game_tag_id); $i++){
                DB::table('games_tags')->insert(
                    ['games_title' => $games->title, 
                    'tags_id' => $game_tag_id[$i]]
                );
            };

            //Add to uploader's game list
            $user_id = auth()->user()->id;
            $lastupdated = date('Y-m-d H:i:s');
            DB::table('sales_log')->insert([
                'game_title'=> $games->title,
                'user_id'=> $user_id,
                'created_at'=> $lastupdated,
                'updated_at'=> $lastupdated
            ]);
        //get all game
            $game =  games::orderBy('created_at','DESC')->paginate(12);

            return view('index',compact('game'))->with('success', 'Game Uploaded');
        }

    /**
     * Display the specified resource.
     *
     * @param  string $title
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {           
        $this->middleware('auth');
        //get game in games database
        $game = DB::table('games')->leftJoin('users', 'users.name','=', 'games.upload_by')->select([
            'users.id as devID',
            'games.title as title',
            'games.slug as slug',
            'games.avg_rating as avg_rating',
            'games.description as description',
            'games.release as release',
            'games.link as link',
            'games.image as image',
            'games.upload_by as upload_by',
            'games.price as price',
            'games.sales as sales'
        ])->where('slug',$slug)->first();
        // get current user id   
        $rate_by = auth()->user()->id;
        //get tags
        $tags = DB::table('games_tags')->leftJoin('tags', 'games_tags.tags_id', '=', 'tags.id')->select(['games_tags.games_title','tags.name'])->where('games_tags.games_title', $game->title)->orderBy('games_tags.games_title','asc')->get();
        // put tags in an array for handling purposes
        $game_tags = array();
        if(count($tags)>0){
            for($i=0; $i<count($tags); $i++){
                $game_tags[$i] = $tags[$i]->name;
            }
        }
        // get the rating
        $rating = DB::table('rating')->select('rating')->where([
            ['game_title',$game->title],
            ['user_id', $rate_by]
        ])->first();
        //get favorite
        $check_favorite = DB::table('favorites')->where([
            ['game_title',$game->title],
            ['user_id', $rate_by]
        ])->first();
        $favorite = 0 ;
        if($check_favorite){
            $favorite = 1;
        } else {
            $favorite = 0;
        }
        //get number of stars ( using db )
        $star_1 = DB::table('rating')->select(DB::raw('count(*) as number'))
                    ->where([['rating',1],['game_title',$game->title]])
                    ->groupBy('game_title')
                    ->first();
        $star_2 = DB::table('rating')->select(DB::raw('count(*) as number'))
                    ->where([['rating',2],['game_title',$game->title]])
                    ->groupBy('game_title')
                    ->first();
        $star_3 = DB::table('rating')->select(DB::raw('count(*) as number'))
                    ->where([['rating',3],['game_title',$game->title]])
                    ->groupBy('game_title')
                    ->first();
        $star_4 = DB::table('rating')->select(DB::raw('count(*) as number'))
                    ->where([['rating',4],['game_title',$game->title]])
                    ->groupBy('game_title')
                    ->first();
        $star_5 = DB::table('rating')->select(DB::raw('count(*) as number'))
                    ->where([['rating',5],['game_title',$game->title]])
                    ->groupBy('game_title')
                    ->first();
        // set default values
        $pre_star = array(
            'star_1' => 0,
            'star_2' => 0,
            'star_3' => 0,
            'star_4' => 0,
            'star_5' => 0,
        );
        // check if not null => assigned value found
        if($star_1 !== null){
            $pre_star['star_1'] = $star_1->number;
        }   
        if($star_2 !== null){
            $pre_star['star_2'] = $star_2->number;
        }
        if($star_3 !== null){
            $pre_star['star_3'] = $star_3->number;
        }
        if($star_4 !== null){
            $pre_star['star_4'] = $star_4->number;
        }
        if($star_5 !== null){
            $pre_star['star_5'] = $star_5->number;
        }
        // put all in array => more compact
        $star = array($pre_star['star_1'], $pre_star['star_2'], $pre_star['star_3'], $pre_star['star_4'], $pre_star['star_5']);
        
        $own = DB::table('sales_log')->where([
            ['game_title', $game->title],
            ['user_id', $rate_by]
        ])->get();
        $owned = false;
        if(count($own)>0){
            $owned = true;
        }
        return view('games.show',['game'=>$game,'rating'=>$rating,'favorite'=>$favorite, 'star'=>$star, 'game_tags'=>$game_tags, 'owned'=>$owned]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $new_profile_count      = DB::table('users')->where('status','Unread')->count();
        $new_game_count         = DB::table('games')->where('status','Unread')->count();
        $new_wallet_count       = DB::table('wallet_history')->where('status','Unread')->count();
        $new_sales_log_count    = DB::table('sales_log')->where('status','Unread')->count();
        $new_game_report_count  = DB::table('report')->where('status','Unread')->count();
        $new_tag_count          = DB::table('tags')->where('status','Unread')->count();
        //get game in games database
        $game = DB::table('games')->where('slug',$slug)->first();
        $tags = Tags::all();

        return view('games.edit',[
            'game'=>$game,
             'tags'=>$tags,
            'new_profile_count'=>$new_profile_count,
            'new_game_count'=>$new_game_count,
            'new_wallet_count'=>$new_wallet_count,
            'new_sales_log_count'=>$new_sales_log_count,
            'new_game_report_count'=>$new_game_report_count,
            'new_tag_count'=>$new_tag_count,             
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $title)
    {
        //data validation
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'link' => 'required',
            'image'=>'image|nullable|max:5999',
            'price'=>'required',

        ]);
        //Handle File Upload

        if($request->hasFile('image') && $request->file('image')->isValid() ){
            //with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store 
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //Create games info
        $game = games::find($title);
        $game->title = $request->input('title');
        $game->description = $request->input('description');
        $game->link = $request->input('link');
        if($request->hasFile('image')){
            $game->image = $fileNameToStore;          
        }
        $game->price = $request->input('price');
        $game->sales = $request->input('sales');
        $game->save();

        //Storing game tags
        $game_tag_id = $request->input('tags');
        if(isset($game_tag_id)){
        for($i = 0; $i<count($game_tag_id); $i++){
            DB::table('games_tags')->insert(
                ['games_title' => $game->title, 
                'tags_id' => $game_tag_id[$i]]
            );
        }; 
    }
        return redirect('/games')->with('success','Game Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        //find it
        $game = games::find($title);
        //delete it
        $game->delete();
        // Session flash
        return redirect('/games')->with('success','Game Deleted');
    }

    public function showReports(){
        $reports = DB::table('report')->leftJoin('users','report.upload_by','=','users.id')->leftJoin('games','report.title','=','games.title')->orderBy('report.id', 'DESC')->paginate(10);

        return view('admin.reports', ['reports'=>$reports]);
    }
    
}
