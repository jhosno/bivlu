<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	public function book()
	{
		return $this->belongsTo('App\Book');
	}
	public function loans()
	{
		return $this->hasMany('App\Loan');
	}
}
