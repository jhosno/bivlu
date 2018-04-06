<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function human()
    {
        return $this->belongsTo('App\Human');
    }

    public function loans()
    {
        return $this->hasMany('App\Loan');
    }

    public function loanRequests()
    {
        return $this->hasMany('App\LoanRequest');
    }

    public function privilegios()
    {
        return $this->hasMany('App\Privilegio');
    }
}
