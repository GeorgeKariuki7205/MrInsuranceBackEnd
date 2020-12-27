<?php

namespace App\Purchases;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $guarded = ['id'];

    public function PurchaseBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }

    public function PurchaseHasManyPaymentsProcessed()
    {
        return $this->hasMany('App\Purchases\PaymentsProcessed', 'purchase_id', 'id');
    }

    public function PurchaseHasManyDocumentsUploaded()
    {
        return $this->hasMany('App\Purchases\DocumentsUploaded', 'purchase_id', 'id');
    }
    public function PurchasebelongsToClient()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }
}
