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
         return $this->hasMany('App\HealthCoverModels\Additional\HealthAdditional', 'insurance_covers_id', 'id');
     }

     public function InsuranceCoverBelongsToSubCategory()
     {
         return $this->belongsTo('App\GeneralModels\SubCategoryCover', 'sub_category_id', 'id');
     }

    //  ! creating te relationships that relate with the Motor Insurance Tables.

    public function InsuranceCoverHasManyMotorInsuranceRelatedBenefits()
    {
        return $this->hasMany('App\MotorInsuranceModels\Benefit', 'insurance_cover_id', 'id');
    }

    public function InsuranceCoverHasManyMotorIsuranceRelatedAdditionalCovers()
    {
        return $this->hasMany('App\MotorInsuranceModels\AdditionalCover', 'insurance_cover_id', 'id');
    }

    public function InsuranceCoverHasManyCommercialClasses()
    {
        return $this->hasMany('App\MotorInsuranceModels\CommercialVehicles\CommercialClass', 'insurance_cover_id', 'id');
    }

    public function InsuranceCoverHasManyPrivateVehicles()
    {
        return $this->hasMany('App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail', 'insurance_cover_id', 'id');
    }

    // public function InsuranceCoverHasManyPrivatePartyCovers()
    // {
    //     return $this->hasMany('App\MotorInsuranceModels\CommercialVehicles\CommercialThirdPartyCost', 'insurance_cover_id', 'id');
    // }

    // public function InsuranceCoverHasManyInsuranceCoversPaymentRatio()
    // {
    //     return $this->hasMany('App\GeneralModels\InsuranceCoversPaymentRatio', 'insurance_cover_id', 'id');
    // }

    public function InsuranceCoverHasManyPurchase()
    {
        return $this->hasMany('App\Purchases\Purchase', 'insurance_cover_id', 'id');
    }
}
