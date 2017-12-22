<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'days',
        'hours',
        'project_id',
        'user_id',
        'company_id'
    ];

    //Company model - task belongs to 1 company  
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    //Project model - task belongs to 1 project
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
   

    //TaskUser - task belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}







?> 
