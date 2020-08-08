<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class CoverAmount extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

    public function coverAmountBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_cover_id', 'id');
    }

    public function CoverAmountHasOnePremium()
    {
        return $this->hasOne('App\HealthCoverModels\Premium', 'covered_amount_id', 'id');
    }

    public function CoveredAmountHasManyBenefits()
    {
        return $this->hasMany('App\HealthCoverModels\Benefits', 'covered_amount_id', 'id');
    }
}
