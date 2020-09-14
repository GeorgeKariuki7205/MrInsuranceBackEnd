<?php

namespace App\MotorInsuranceModels\PrivateVehicles;

use Illuminate\Database\Eloquent\Model;

class PrivateComprehensiveCover extends Model
{
    private $guarded = ['id'];

    // ! creating the relationship to the insurance Covers. 

    public function PrivateComprehensiveCoverBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }
}
