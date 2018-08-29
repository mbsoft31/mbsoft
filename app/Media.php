<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
		'name',
		'type',
		'url',
		'size',
		'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function gallery()
    {
    	return $this->belongsToMany('App\Gallery');
    }
}
