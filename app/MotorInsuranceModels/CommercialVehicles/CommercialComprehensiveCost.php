<?php

namespace App\MotorInsuranceModels\CommercialVehicles;

use Illuminate\Database\Eloquent\Model;

class CommercialComprehensiveCost extends Model
{
    protected $guarded = ['id']; 
        
    protected $table = 'motor_commercial_comprehensive_costs';

    // ! creating the relationship to the Commercial Classes. 

    public function CommercialComprehensiveBelongsToCommercialClass()
    {
        return $this->belongsTo('App\MotorInsuranceModels\CommercialVehicles\CommercialClass', 'commercial_class_id', 'id');
    }
}
