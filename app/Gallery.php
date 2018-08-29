<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    	'user_id',
		'description'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function medias()
    {
    	return $this->belongsToMany('App\Media');
    }

    public function screen()
    {
    	return $this->hasMany('App\Screen');
    }
}
