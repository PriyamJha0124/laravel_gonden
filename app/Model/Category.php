<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'logo', 'status'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->hasMany('App\Model\Shop');
    }
}
