<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $table = 'tags';

    public function games(){
    	/// may have problems
    	return $this->belongsToMany('App\games','games_tags','id','title');
    }

    
}
