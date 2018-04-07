<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class games_tags extends Model
{
    //
    public $timestamps = false;
    
	protected $table = 'games_tags';

    protected $fillable = [
       	'games_title','tags_id',
    ];
}
