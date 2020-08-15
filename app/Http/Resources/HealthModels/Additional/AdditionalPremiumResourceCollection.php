<?php

namespace App\Http\Resources\HealthModels\Additional;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalPremiumResourceCollection extends JsonResource
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
                'insurance_cover_company' => $this->PremiumBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
                'insurance_cover' => $this->PremiumBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
                'additionalName' => $this->PremiumBelongsToAdditional->name,
                'cost'=>$this->cost,
                'limit'=>$this->limit,
                ];
    }
}
