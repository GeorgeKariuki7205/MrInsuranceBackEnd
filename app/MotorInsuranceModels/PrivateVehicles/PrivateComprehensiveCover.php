<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateComprehensiveCover extends Model
{
    
    protected $table = 'motor_private_comprehensive_covers';
    protected $guarded = ['id'];

    // ! creating the relationship to the insurance Covers. 

    public function PrivateComprehensiveCoverBelongsToPrivateCoverDetails()
    {
        return $this->belongsTo('App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail', 'private_cost_id', 'id');
    }
    
}
