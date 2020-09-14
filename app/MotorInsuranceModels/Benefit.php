<?php

namespace App\MotorInsuranceModels;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $guarded = ['id'];

    public function motorInsuranceBenefitBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }

}
