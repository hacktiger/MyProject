<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class games extends Model
{
    //Table Name
    protected $table = 'games';
    //Primary
    //public $primaryKey = '';
    protected $keyType = 'string';
    public $primaryKey = 'title';

    protected $fillable = [
        'title',
    ];
   
    public function tags(){
    	return $this->belongsToMany('App\Tags');
    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

