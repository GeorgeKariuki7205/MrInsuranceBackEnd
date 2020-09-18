<?php

namespace App\Http\Resources\MotorModels\PrivateVehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateComprehensiveResource extends JsonResource
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
            'id' => $this->id,
            // insurance_cover_id
            'cover'  => $this->PrivateComprehensiveCoverBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'company' => $this->PrivateComprehensiveCoverBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'min_sum_insured' => $this->min_sum_insured,
            'sum_insured_from_value' => $this->sum_insured_from_value,
            'sum_insured_to_value' => $this->sum_insured_to_value,
            'rate' => $this->rate,
            'minimum_premium_amount' => $this->minimum_premium_amount,
            'min_age' => $this->min_age,
            'max_age' => $this->max_age,
        ];
    }
}
