<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['shop_id', 'user_id', 'review'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }
}
