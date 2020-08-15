<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class CoverAmountsResource extends JsonResource
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
            'amount' => $this-> amount,
            'insurance_cover_company' => $this->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
        ];
    }
}
