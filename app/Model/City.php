<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->hasMany('App\Model\Shop');
    }
}
