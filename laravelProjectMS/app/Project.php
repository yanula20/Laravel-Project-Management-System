<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'days',
    	'company_id',
    	'user_id'
    ];


    //Company model - project belongs to 1 user's company
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    //User model - project belongs to 1 user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //ProjectUser model - project belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\User', 'ProjectUser');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}





?> 

    



