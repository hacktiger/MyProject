<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use App\User;



class GamesController extends Controller
{
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
        return view('games.create');
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
        $game->upload_by = $request->input('upload');
        $game->price = $request->input('price');
        $game->sales = $request->input('sales');
        $game->save();

        //Storing game tags
        $FPS = $request->input('FPS');
        if($FPS!== null){
            $game->FPS = '1';
        }     
        $Adventure = $request->input('Adventure');
        if($Adventure!== null){
            $game->Adventure = '1';
        }
        $RPG = $request->input('RPG');
        if($RPG!== null){
            $game->RPG = '1';
        }
        $Action = $request->input('Action');
        if($Action!== null){
            $game->Action = '1';
        }
        $Puzzle = $request->input('Puzzle');
        if($Puzzle!== null){
            $game->Puzzle = '1';
        }
        $Strategy = $request->input('Strategy');
        if($Strategy!== null){
            $game->Strategy = '1';
        }
        $game->save();
        
        return redirect('/games')->with('success','Game Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //
        $game = games::find($title);
        // get the tags
        $tags = array();

        if($game->Adventure == '1'){
            $tags[1] = 'Adventure';
        }
        if($game->FPS == '1'){
            $tags[2] = 'FPS';
        }
        if($game->RPG == '1'){
            $tags[3] = 'RPG';
        }
        if($game->Action == '1'){
            $tags[4] = 'Action';
        }
        if($game->Puzzle == '1'){
            $tags[5] = 'Puzzle';
        }
        if($game->Strategy == '1'){
            $tags[6] = 'Strategy';
        }

        return view('games.show',['game'=>$game,'tags'=>$tags]);
        //->with('game',$game)
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
        return view('games.edit',['game'=>$game]);
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

        $game->upload_by = $request->input('upload');
        $game->price = $request->input('price');
        $game->sales = $request->input('sales');

        

        $game->save();

        //Storing game tags
        $FPS = $request->input('FPS');
        if($FPS!== null){
            $game->FPS = '1';
        }     
        $Adventure = $request->input('Adventure');
        if($Adventure!== null){
            $game->Adventure = '1';
        }
        $RPG = $request->input('RPG');
        if($RPG!== null){
            $game->RPG = '1';
        }
        $Action = $request->input('Action');
        if($Action!== null){
            $game->Action = '1';
        }
        $Puzzle = $request->input('Puzzle');
        if($Puzzle!== null){
            $game->Puzzle = '1';
        }
        $Strategy = $request->input('Strategy');
        if($Strategy!== null){
            $game->Strategy = '1';
        }
        $game->save();
        
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
    }
}
