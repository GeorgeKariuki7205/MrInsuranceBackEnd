<?php

namespace App\Http\Resources\HealthModels\Additional;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalWaitingPeriodResourceCollection extends JsonResource
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
            'insurance_cover_company' => $this->AdditionalWaitingPeriodBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->AdditionalWaitingPeriodBelongsToAdditional->AdditionalBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'additionalName' => $this->AdditionalWaitingPeriodBelongsToAdditional->name,
            'waitingPeriods'=>[
                'situation'=> $this->situation,
                'period_amount'=> $this->period_amount,
                'period_time'=>$this->period_time,
            ],
            ];
    }
}
