<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['shop_id', 'name', 'picture'];
	
    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo('App\Model\Shop');
    }
    
}
