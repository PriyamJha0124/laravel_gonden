<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'user_type', 'users_message', 'is_read',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Model\AppUser');
    }
}
