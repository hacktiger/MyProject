<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tags;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show'); 
        $this->middleware('admin');
         
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
            'name'=>'required|max:255'
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
        // get all possible tags
        $tags = DB::table('tags')->orderBy('name','ASC')->get();
        // get all games with $this->$id
        $game  = DB::table('games_tags')->leftJoin('tags', 'games_tags.tags_id', '=', 'tags.id')
        ->join('games','games_tags.games_title','=','games.title')
        ->select(['games_tags.games_title','games.slug','games.image','games.upload_by','games.avg_rating'])
        ->where('games_tags.tags_id',$id)->orderBy('games_tags.games_title','asc')->paginate(10);
        //get all games info
        
        return view('tags.game_with_tag',['game'=>$game, 'tags'=>$tags, 'this_tag' => $this_tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //// get all unread
        $admin_controller = new AdminController();
        $all_unread = $admin_controller->getNotice();
        //get tag in games database
        $tag = DB::table('tags')->where('id',$id)->first();


        return view('tags.tags-edit',[
            'tag'=>$tag,
            'all_unread'=>$all_unread,          
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
        $this->validate($request, [
            'name'=>'required|max:255'
        ]);
        $tag = Tags::find($id);
        $tag->name =  $request->input('name');
        $tag->save();


        return redirect()->back()->with('success','Tag Edited');
        
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
        $tag = Tags::find($id);

        $tag->delete();
        return redirect()->back()->with('success','Tag Deleted');
    }
}
