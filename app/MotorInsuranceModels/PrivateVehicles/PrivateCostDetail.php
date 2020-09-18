<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateCostDetail extends Model
{
    protected $guarded = ['id'];

    public function PrivateCostDetailsHasOneCommercialCost()
    {
        return $this->hasOne('App\MotorInsuranceModels\PrivateVehicles\PrivateComprehensiveCover', 'private_cost_id', 'id');
    }

    public function PrivateCostDetailsHasOneThirdPartyCost()
    {
        return $this->hasOne('App\MotorInsuranceModels\PrivateVehicles\PrivateThirdPartyCover', 'private_cost_id', 'id');
    }

    public function privateThirdPartyCoverBelongsToCover()
    {
        return $this->belongsTo('App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail', 'insurance_cover_id', 'id');
    }
}
