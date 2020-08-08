<?php

namespace App\HealthCoverModels\Additional;

use Illuminate\Database\Eloquent\Model;

class HealthAdditional extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships.

    public function AdditionalBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_covers_id', 'id');
    }

    public function AdditionalHasManyBenefits()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditionalBenefit', 'additional_id', 'id');
    }

    public function AdditionalHasManyNotCovered()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditionalNotCovered', 'additional_id', 'id');
    }

    public function AdditionalHasManyWaitingPeriod()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod', 'additional_id', 'id');
    }

    public function AdditionalHasManyPremium()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditionalPremium', 'additional_id', 'id');
    }

}
