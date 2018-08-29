<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
		
	protected $fillable = [
		'line_1',
		'line_2',
		'line_3',
		'city',
		'state',
		'zip',
		'country'
	];

	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}
