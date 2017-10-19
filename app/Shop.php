<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //

    protected $fillable = [
        'name', 'meter_no', 'user_id', 'address', 'service_address', 'last_reading'
    ];

        public function user()
    {
        return $this->belongsTo('App\User');
    }

        public function bills()
    {
        return $this->hasMany('App\Billing');
    }
}
