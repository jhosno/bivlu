<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }
}
