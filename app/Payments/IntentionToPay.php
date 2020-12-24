<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class IntentionToPay extends Model
{
    //
    protected $guarded = ['id']; 
    
    public function IntentionToPayBelongsToVisitor()
    {
        return $this->belongsTo('App\Visitor\Visitor', 'visitorId', 'id');
    }
}
