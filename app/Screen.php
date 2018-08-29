<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    
	protected $fillable = [
		'name',
		'resoulution',
		'location',
		'gallery_id',
		'user_id',
	];

	public function gallery()
	{
		return $this->belongsTo('App\Gallery');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
