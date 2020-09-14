<?php

namespace App\MotorInsuranceModels\CommercialVehicles;

use Illuminate\Database\Eloquent\Model;

class CommercialClass extends Model
{
    protected $guarded = ['id'];

    // ! creating the relationship to the insurance Covers. 

    public function commercialClassBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }
}
