<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateThirdPartyCover extends Model
{
    protected $guarded = ['id'];
    protected $table = 'motor_private_third_party_covers';
    public function privateThirdPartyCoverBelongsToCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }
    
}
