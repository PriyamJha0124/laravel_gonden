<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['app_name', 'about', 'picture'];
	
    protected $dates = ['created_at', 'updated_at'];
}
