<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
     protected $fillable = [
        'shop_id', 'previous_date', 'current_date', 'no_days', 'previous_reading', 'current_reading', 'usage', 'billed_usage', 'period_charge', 'access_charge', 'statement_date'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function bill_history()
    {
        return $this->hasOne('App\Bill_History');
    }
}

