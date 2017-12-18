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
        return $this->belongsTo('App\Project');
    }

    //Project model - task belongs to 1 project
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    //User model - task belongs to 1 user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //TaskUser - task belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\User', 'TaskUser');
    }
}







?> 
