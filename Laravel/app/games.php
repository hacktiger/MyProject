<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class games extends Model
{
    //Table Name
    protected $table = 'games';
    //Primary
    //public $primaryKey = '';
    protected $keyType = 'string';
    public $primaryKey = 'title';
   
    public function tags(){
    	return $this->belongsToMany('App\Tags');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

