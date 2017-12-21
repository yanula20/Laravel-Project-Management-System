<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'url',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];


	public function commentable()
	{
	    return $this->morphTo();
	}
	    
	/**
	 * Return the user associated with this comment.
	 *
	 * @return array
	 */

	//User model - comment belongs to 1 user
	 public function user()
	 {
	     return $this->hasOne('\App\User', 'id', 'user_id', 'first_name', 'middle_name', 'last_name', 'email', 'city');
	 }


}




 ?> 