<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $fillable = [
        'shop_id', 'date_recieved', 'amount', 'description'
    ];

    protected $dates = ['date_recieved'];
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

}
