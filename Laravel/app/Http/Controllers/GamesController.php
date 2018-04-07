<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;
use App\Tags;
use App\games_tags;
use Session;



class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
        $game = new games;
        $game->title = $request->input('title');
        
        $game->description = $request->input('description');
        $game->link = $request->input('link');
        $game->image = $fileNameToStore;
        $game->upload_by = auth()->user()->id;
        $game->price = $request->input('price');
        $game->sales = $request->input('sales');
        $game->save();
        // Adding the tags
        $game->title=$request->input('title');
        $game_tag_id = $request->input('tags');
        for($i = 0; $i<count($game_tag_id); $i++){
            DB::table('games_tags')->insert(
                ['games_title' => $game->title, 
                 'tags_id' => $game_tag_id[$i]]
            );
        };
        

        
        return redirect('/games',['game'=>$game])->with('success','Game Created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {       
        
        //$game = DB::table('games')->where('title',$title)->get();
        $game = games::find($title);
        
        // get the tags
        

        return view('games.show',['game'=>$game]);
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
        if(auth()->user()->id != $game->upload_by){
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
