<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
