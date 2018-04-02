<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game_tag extends Model
{
    //
    protected $table = 'game_tag';
    public $foreignKey = 'title';
    public $timestamps = false;
}
