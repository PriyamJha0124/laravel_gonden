<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    protected $fillable = ['category_id', 'name', 'description','rating','price','discount','location', 'city_id', 'latitude', 'longitude', 'contact', 'time_from', 'time_to', 'picture'];
	
    protected $dates = ['created_at', 'updated_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function picture()
    {
        return $this->hasMany('App\Model\Picture');
    }

    public function feature()
    {
        return $this->hasMany('App\Model\Feature');
    }

    public function benefit()
    {
        return $this->hasMany('App\Model\Benefit');
    }
    
    public function promo()
    {
        return $this->hasMany('App\Model\Promo');
    }

    public function review()
    {
        return $this->hasMany('App\Model\Review');
    }

    public function offer()
    {
        return $this->hasMany('App\Model\Offer');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City');
    }

    public function usedpromo()
    {
        return $this->hasMany('App\Model\UsedPromo');
    }
}
