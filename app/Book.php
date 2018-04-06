<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    
    public function items()
    {
    	return $this->hasMany('App\Item');
    }

    public function publisher()
    {
    	return $this->belongsTo('App\Publisher');
    }

    public function specialities()
    {
    	return $this->belongsTo('App\Speciality');
    }

    public function authors()
    {
    	return $this->belongsToMany('App\Author');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
