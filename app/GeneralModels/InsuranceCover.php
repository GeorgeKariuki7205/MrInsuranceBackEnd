<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class InsuranceCover extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

     public function InsuranceProviderBelongToCompany()
     {
         return $this->belongsTo('App\Company', 'company_id', 'id');
     }

     public function InsuranceProviderBelongsToCover()
     {
         return $this->belongsTo('App\Cover', 'cover_id', 'id');
     }

     public function InsuranceCoverHasManyCoverAmounts()
     {
         return $this->hasMany('App\HealthCoverModels\CoverAmount', 'insurance_cover_id', 'id');
     }

     public function InsuranceCoverHasManyNotCovered()
     {
         return $this->hasMany('App\HealthCoverModels\NotCovered', 'insurance_cover_id', 'id');
     }

     public function InsuranceCoverHasManyWaitingPeriods()
     {
         return $this->hasMany('App\HealthCoverModels\WaitingPeriod', 'insurance_cover_id', 'id');
     }

     public function InsuranceCoverHasManyAdditional()
     {
         return $this->hasMany('App\HealthCoverModels\Additional\Additional', 'insurance_cover_id', 'id');
     }
}
