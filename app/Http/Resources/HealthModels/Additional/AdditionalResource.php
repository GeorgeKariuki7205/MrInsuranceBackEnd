<?php

namespace App\Http\Resources\HealthModels\Additional;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalResource extends JsonResource
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
            'company'=> $this->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'cover'=> $this->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'name'=>$this->name,
            'type_of_calculation'=> $this->type_of_calculation,
        ];
    }
}
