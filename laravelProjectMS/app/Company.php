<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];


	//User model - company belongs 1 user
	public function user()
	{
	    return $this->belongsTo('App\User');
	}

	//Project model - company has many projects
	public function projects()
	{
	    return $this->hasMany('App\Project');
	}


	 public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}




?> 