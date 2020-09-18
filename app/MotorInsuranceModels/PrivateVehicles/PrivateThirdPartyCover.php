<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateThirdPartyCover extends Model
{
    protected $guarded = ['id'];
    protected $table = 'motor_private_third_party_covers';
    public function PrivateThirdPartyCoverBelongsToPrivateCoverDetails()
    {
        return $this->belongsTo('App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail', 'private_cost_id', 'id');
    }
    
}
