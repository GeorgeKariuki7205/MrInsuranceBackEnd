<?php

namespace App\MotorInsuranceModels\CommercialVehicles;

use Illuminate\Database\Eloquent\Model;

class CommercialClass extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'motor_commercial_classes';
    // ! creating the relationship to the insurance Covers. 

    public function commercialClassBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }
    public function CommercialClassHasManyCommerialComprehesiveCosts()
    {
        return $this->hasMany('App\MotorInsuranceModels\CommercialVehicles\CommercialComprehensiveCost', 'commercial_class_id', 'id');
    }
}
