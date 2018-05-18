<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tags;
use Exception;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show'); 
        $this->middleware('admin')->except('show');
         
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
            'name'=>'required|max:20|unique:tags'
        ]);
        $tag = new Tags;
        $tag->name =  $request->input('name');
        $tag->save();


        return redirect()->back()->with('success', 'Tag created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get this tag
        $this_tag = DB::table('tags')->where('id',$id)->first();
        //
        // page info
        $page_title = "All ".$this_tag->name." Games";
        $page_desc = "This is the list of all ".$this_tag->name." games";
        // get all possible tags
        $tags = DB::table('tags')->orderBy('name','ASC')->get();
        // get all games with $this->$id
        $game  = DB::table('games_tags')->leftJoin('tags', 'games_tags.tags_id', '=', 'tags.id')
        ->join('games','games_tags.games_title','=','games.title')
        ->select(['games_tags.games_title as title','games.slug','games.image','games.upload_by','games.avg_rating'])
        ->where('games_tags.tags_id',$id)->orderBy('games_tags.games_title','asc')->paginate(10);
        //get all games info
        

        return view('allGames',['game'=>$game, 'tags'=>$tags, 'page_title'=>$page_title, 'page_desc'=>$page_desc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get tag in games database
        $tag = Tags::find($id);

        return view('tags.tags-edit',[
            'tag'=>$tag,       
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
        $this->validate($request, [
            'name'=>'required|max:20'
        ]);
        $tag = Tags::find($id);
        $tag->name =  $request->input('name');
        $tag->save();


        return redirect()->back()->with('success','Tag Edited');
        }catch (Exception $e){
            return redirect()->back()->with('error', 'Duplicated Tag name');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find is only possible with primary key
        $tag = Tags::destroy($id);

        return redirect()->back()->with('success','Tag Deleted');
    }
}
