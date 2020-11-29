<?php

namespace App\MotorInsuranceModels;

use Illuminate\Database\Eloquent\Model;

class AdditionalCover extends Model
{
    protected $guarded = ['id'];
    
    protected $table = 'motor_additional_covers';
    
    public function additionalMotorCoverBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }
}
