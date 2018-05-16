<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use App\Notification;


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
        $game =  games::orderBy('created_at','DESC')
        ->select('title','slug','description','price','sales','image','link','upload_by','avg_rating')
        ->where('approved','Y')->paginate(9);
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

        // ------ //
        //  MAIN  //
        // -------//
        //get all tags
        $tags = Tags::all();
        //return to create game
        $user = auth()->user()->name;
        
        return view('games.create',[
            'tags'=>$tags,
            'userName'=>$user,
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
            $fileNameToStore = 'khongCoImage_game.jpg';
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
        return redirect('/games')->with('success','Game Created');
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
            'games.sales as sales',
            'games.approved as approved',
        ])->where('slug',$slug)->first();
        // get current user id   
        if ($game->approved == 'N'){
            return redirect('/games')->with('error', 'Game does not Exist / have yet to be Approved');
        }
        $rate_by = auth()->user()->id;
        //get tags
        $game_tags = DB::table('games_tags')->leftJoin('tags', 'games_tags.tags_id', '=', 'tags.id')->select(['games_tags.games_title','tags.name','games_tags.tags_id as tags_id'])->where('games_tags.games_title', $game->title)->orderBy('games_tags.games_title','asc')->get();
        // put tags in an array for handling purposes
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
        $star = $this->getStar($game);
        
        // boolean owned/not
        $own = DB::table('sales_log')->where([
            ['game_title', $game->title],
            ['user_id', $rate_by]
        ])->get();
        $owned = false;
        if(count($own)>0){
            $owned = true;
        }
        // return view
        if(Auth::user()->auth_level == 'admin'){

            return view('admin.show.show-game',['game'=>$game,'rating'=>$rating,'favorite'=>$favorite, 'star'=>$star, 'game_tags'=>$game_tags, 'owned'=>$owned ]);
        } else {
            return view('games.show',['game'=>$game,'rating'=>$rating,'favorite'=>$favorite, 'star'=>$star, 'game_tags'=>$game_tags, 'owned'=>$owned]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //get game in games database
        $game = DB::table('games')->where('slug',$slug)->first();
        // get all available tags
        $tags = Tags::all();
        // get games tags
        $games_tags = DB::table('games_tags')->leftJoin('tags', 'tags.id', '=', 'games_tags.tags_id')
        ->select('tags.name', 'games_tags.tags_id')->where('games_title', $game->title)->get();
        return view('games.edit',[
            'game'=>$game,
            'tags'=>$tags,
            'games_tags'=>$games_tags,      
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
            if (DB::table('games_tags')->where([
                ['games_title',$game->title],
                ['tags_id', $game_tag_id]
            ])->exists()){
                return redirect()->back()->with('error', 'Duplicate tag');
            
        }else{
            DB::table('games_tags')->insert(
                ['games_title' => $game->title, 
                'tags_id' => $game_tag_id[$i]]
            );
        }
        //Remove tag
        $tag_remove = $request->remove;
        var_dump($tag_remove);
        if (isset($tag_remove)){
            for ($j = 0; $j < count($tag_remove); $j++){
                DB::table('games_tags')->where([
                    ['games_title', $game->title],
                    ['tags_id', $tag_remove]
                ])->delete();
            }
        }

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
    /**
    *   get rating of the game
    *    
    *   @param JSON data of the game get in data
    *   @return    array $star;
    **/
    public function getStar($game){
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

        return $star;
    }
    public function approve()
    {
        $game=Input::get('title');
        games::where('title', $game)->update(['approved'=>'Y']);
        return redirect('/admin/game-manage')->with('success', 'Game Approved');
    }
}
