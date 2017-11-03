<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_History extends Model
{
    //

    protected $fillable = [
        'billing_id', 'previous_bill_date', 'previous_pay_date', 'previous_bill', 'previous_pay'
    ];

    protected $table = "bill__histories";

    protected $dates = ['previous_pay_date', 'previous_bill_date'];
    
        public function bill()
    {
        return $this->belongsTo('App\Billing');
    }
}
