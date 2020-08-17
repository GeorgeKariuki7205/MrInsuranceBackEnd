<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class HealthCoverAmount extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

    //  public $table = "";

     // ? Creating the relationships. 

    public function coverAmountBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }

    public function CoverAmountHasManyPremium()
    {
        return $this->hasMany('App\HealthCoverModels\HealthPremium', 'covered_amount_id', 'id');
    }

    public function CoveredAmountHasManyBenefits()
    {
        return $this->hasMany('App\HealthCoverModels\HealthBenefit', 'covered_amount_id', 'id');
    }
}
