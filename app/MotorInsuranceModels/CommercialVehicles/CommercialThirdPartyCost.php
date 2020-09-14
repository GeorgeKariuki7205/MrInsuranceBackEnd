<?php

namespace App\MotorInsuranceModels\CommercialVehicles;

use Illuminate\Database\Eloquent\Model;

class CommercialThirdPartyCost extends Model
{
    protected $guarded = ['id'];

    public function CommercialThirdPartyCostBelongsToCommercialTYpeThirdParty()
    {
        return $this->belongsTo(' App\MotorInsuranceModels\CommercialVehicles\CommercialTypeOfThirdPartyCost', 'type_of_third_party_id', 'id');
    }

    public function CommercialThirdPartyBelongsToCommercialClass()
    {
        return $this->belongsTo('App\MotorInsuranceModels\CommercialVehicles\CommercialClass', 'commercial_class_id', 'id');
    }
}
