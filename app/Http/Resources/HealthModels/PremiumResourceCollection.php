<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class PremiumResourceCollection extends JsonResource
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
            'insurance_cover_company' => $this->PremiumBelongsToCoverAmount->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->PremiumBelongsToCoverAmount->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'covered_amount'=> $this->PremiumBelongsToCoverAmount->amount,
            'min_age'=>$this->min_age,
            'max_age'=> $this->max_age,
            'principal_member'=> $this->principal_member,
            'spouse'=>$this->spouse,
            'child'=>$this->child,
        ];
    }
}
