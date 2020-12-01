<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsedPromo extends Model
{
    protected $fillable = ['user_id', 'user_name', 'shop_id','promo_code'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }
}

