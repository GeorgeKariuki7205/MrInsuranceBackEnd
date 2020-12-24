<?php

namespace App\Purchases;

use Illuminate\Database\Eloquent\Model;

class PaymentsProcessed extends Model
{
    protected $guarded = ['id'];

    public function PaymentsProcessedPurchase()
    {
        return $this->belongsTo('App\Purchases\Purchase', 'purchase_id', 'id');
    }
}
