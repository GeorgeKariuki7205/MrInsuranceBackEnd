<?php

namespace App\Http\Resources\MotorModels\CommercialVehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialClassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,            
            'company'=>$this->commercialClassBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'cover'=>$this->commercialClassBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'name'=>$this->name,           
            'description'=>$this->description,   
            'hasThirdParty'=>$this->hasThirdParty,  
            'min_sum_insured'=>$this->min_sum_insured,
            'minimum_premium_amount'=>$this->minimum_premium_amount,
            'min_age'=>$this->min_age,               
            'max_age'=>$this->max_age,
        ];
    }
}
