<?php

namespace App\HealthCoverModels\Additional;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
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
        return $this->hasMany('App\HealthCoverModels\Additional\AdditionalBenefit', 'additional_id', 'id');
    }

    public function AdditionalHasManyNotCovered()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\AdditionalNotCovered', 'additional_id', 'id');
    }

    public function AdditionalHasManyWaitingPeriod()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\AdditionalWaitingPeriod', 'additional_id', 'id');
    }

    public function AdditionalHasManyPremium()
    {
        return $this->hasMany('App\HealthCoverModels\Additional\Premium', 'additional_id', 'id');
    }

}
