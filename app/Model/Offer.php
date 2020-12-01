<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['shop_id', 'name', 'description'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }
}
