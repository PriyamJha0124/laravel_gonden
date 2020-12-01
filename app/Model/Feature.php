<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['shop_id', 'name', 'logo'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }
}
