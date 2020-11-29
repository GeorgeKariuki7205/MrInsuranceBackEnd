<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateCostDetail extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'motor_private_cost_details';

    public function PrivateCostDetailsHasManyComprehensiveCost()
    {
        return $this->hasMany('App\MotorInsuranceModels\PrivateVehicles\PrivateComprehensiveCover', 'private_cost_id', 'id');
    }

    public function PrivateCostDetailsHasManyThirdPartyCost()
    {
        return $this->hasMany('App\MotorInsuranceModels\PrivateVehicles\PrivateThirdPartyCover', 'private_cost_id', 'id');
    }

    public function privateThirdPartyCoverBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail', 'insurance_cover_id', 'id');
    }
}
