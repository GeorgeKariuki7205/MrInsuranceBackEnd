<?php

namespace App\Http\Resources\HealthModels\Additional;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalBenefitResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company'=> $this->AdditionalBenefitBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'cover'=> $this->AdditionalBenefitBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'additional_name'=> $this->AdditionalBenefitBelongsToAdditional->name,
            'benefit'=>[
                'benefit_name'=>$this->name,
                'description'=>$this->description,
            ]            
        ];
    }
}
