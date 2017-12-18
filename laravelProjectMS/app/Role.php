<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    //User model - role has many users
	public function users()
	{
	    return $this->hasMany('App\User');
	}
}







?> 