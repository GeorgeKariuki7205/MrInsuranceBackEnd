<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class WaitingPeriodsResourceCollection extends JsonResource
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
            'insurance_cover_company' => $this->WaitingPeriodBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->WaitingPeriodBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'waitingPeriods'=>[
                'situation'=> $this->situation,
                'period_amount'=> $this->period_amount,
                'period_time'=>$this->period_time,
            ]
        ];
    }
}
