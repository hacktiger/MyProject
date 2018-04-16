<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use App\rating;




class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //the laravel way
        //$gamesInfo =  games::orderBy('title','ASC')->take(#)->get();
        //Take = Limit

        // Need to change so that each click leads to a personal page
        $game =  games::orderBy('created_at','DESC')->paginate(8);


        return view('index',compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tags::all();
        return view('games.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'link' => 'required',
            'image'=>'image|nullable|max:1999',
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
        $games = new games;
        $games->title = $request->input('title');
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

        $game =  games::orderBy('created_at','DESC')->paginate(12);
            
        return view('index',compact('game'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {           
        //get game in games database
        $game = games::find($title);
        // get current user id
        $rate_by = auth()->user()->id;
        //get tags
        $tags = DB::table('games_tags')->leftJoin('tags', 'games_tags.tags_id', '=', 'tags.id')->select(['games_tags.games_title','tags.name'])->where('games_tags.games_title', 'Black Squad 3')->orderBy('games_tags.games_title','asc')->get();
        $game_tags = array();
        if(count($tags)>0){
            for($i=0; $i<count($tags); $i++){
                $game_tags[$i] = $tags[$i]->name;
            }
        }
        // get the rating
        $rating = DB::table('rating')->select('rating')->where([
            ['game_title',$title],
            ['user_id', $rate_by]
        ])->first();
        //get favorite
        $favorite = DB::table('favorites')->select('favorite')->where([
            ['game_title',$title],
            ['user_id', $rate_by]
        ])->first();
        //get number of stars ( using db )
        $star_1 = DB::table('rating')->select(DB::raw('count(*) as number'))->where([['rating',1],['game_title',$title]])->groupBy('game_title')->first();
        $star_2 = DB::table('rating')->select(DB::raw('count(*) as number'))->where([['rating',2],['game_title',$title]])->groupBy('game_title')->first();
        $star_3 = DB::table('rating')->select(DB::raw('count(*) as number'))->where([['rating',3],['game_title',$title]])->groupBy('game_title')->first();
        $star_4 = DB::table('rating')->select(DB::raw('count(*) as number'))->where([['rating',4],['game_title',$title]])->groupBy('game_title')->first();
        $star_5 = DB::table('rating')->select(DB::raw('count(*) as number'))->where([['rating',5],['game_title',$title]])->groupBy('game_title')->first();
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
        
        return view('games.show',['game'=>$game,'rating'=>$rating,'favorite'=>$favorite, 'star'=>$star, 'game_tags'=>$game_tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        //
        $game = games::find($title);
        $tags = Tags::all();

        //Check for correct user
        // may want to change !== to !=
        if(auth()->user()->name != $game->upload_by){
            return redirect('/games')->with('error', 'Unauthorized Page');
        }
        
        return view('games.edit',['game'=>$game, 'tags'=>$tags]);
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
        //
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'link' => 'required',
            'image'=>'image|nullable|max:1999',
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
        };

        $game->price = $request->input('price');
        $game->sales = $request->input('sales');
        $game->save();

        //Storing game tags
        $game->title=$request->input('title');
        $game_tag_id = $request->input('tags');
        for($i = 0; $i<count($game_tag_id); $i++){
            DB::table('games_tags')->insert(
                ['games_title' => $game->title, 
                 'tags_id' => $game_tag_id[$i]]
            );
        }; 
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
        //
        $game = games::find($title);

        //Check for correct user
        if(auth()->user()->id != $game->upload_by){
            return redirect('/games')->with('error', 'Unauthorized Page');
        }

        $game->delete();
        return redirect('/games')->with('success','Game Deleted');
    }
}
