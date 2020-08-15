<?php

namespace App\Http\Resources\HealthModels\Additional;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalNotCovered extends JsonResource
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
            'company'=> $this->AdditionalNotCoveredBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'cover'=> $this->AdditionalNotCoveredBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'additional_name'=> $this->AdditionalNotCoveredBelongsToAdditional->name,
            'not_covered'=>[
                'not_covered'=>$this->name,
                'description'=>$this->description,
            ]
        ];
    }
}
