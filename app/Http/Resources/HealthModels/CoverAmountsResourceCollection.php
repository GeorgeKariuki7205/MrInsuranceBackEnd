<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class CoverAmountsResourceCollection extends JsonResource
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
            'amount' => $this-> amount,
            'insurance_cover_company' => $this->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
        ];
    }
}
