<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class CoverPaymentRatio extends Model
{
    //
    protected $guarded = ['id'];
    protected $table = 'covers_payment_ratios';
    public function insuranceCoversPaymentRatioBelongToCover()
    {
        return $this->belongsTo('App\GeneralModels\Cover', 'covers_id', 'id');
    }
}
