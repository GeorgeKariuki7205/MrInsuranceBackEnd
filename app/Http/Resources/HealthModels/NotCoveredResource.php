<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class NotCoveredResource extends JsonResource
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
            'insurance_cover_company' => $this->NotCoveredBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->NotCoveredBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'name'=> $this->name,

        ];
    }
}
