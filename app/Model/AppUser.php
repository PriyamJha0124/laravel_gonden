<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $fillable = ['name', 'email', 'contact', 'city', 'gender', 'birthdate'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function message()
    {
        return $this->hasMany('App\Model\Message');
    }
}
