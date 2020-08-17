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
         return $this->belongsTo('App\GeneralModels\Company', 'company_id', 'id');
     }

     public function InsuranceProviderBelongsToCover()
     {
         return $this->belongsTo('App\GeneralModels\Cover', 'cover_id', 'id');
     }

     public function InsuranceCoverHasManyCoverAmounts()
     {
         return $this->hasMany('App\HealthCoverModels\HealthCoverAmount', 'insurance_cover_id', 'id');
     }

     public function InsuranceCoverHasManyNotCovered()
     {
         return $this->hasMany('App\HealthCoverModels\HealthNotCovered', 'insurance_covers_id', 'id');
     }

     public function InsuranceCoverHasManyWaitingPeriods()
     {
         return $this->hasMany('App\HealthCoverModels\HealthWaitingPeriod', 'insurance_covers_id', 'id');
     }

     public function InsuranceCoverHasManyAdditional()
     {
         return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditional', 'insurance_cover_id', 'id');
     }

     public function InsuranceCoverBelongsToSubCategory()
     {
         return $this->belongsTo('App\GeneralModels\SubCategory', 'sub_category_id', 'id');
     }
}
