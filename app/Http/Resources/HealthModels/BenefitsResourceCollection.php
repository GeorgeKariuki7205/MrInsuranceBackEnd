<?php

namespace App\Http\Resources\HealthModels;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefitsResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $benefit_details = null;
        if ($request->type_of_benefit == 1) {
            # code...
            $benefit_details= array();
            array_push($request->amount);

        }        
        return [
            'covered_amount_id'=> $this->BenefitsBelongToCoverAmount->amount,
            'insurance_cover_company' => $this->BenefitsBelongToCoverAmount->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,
            'insurance_cover' => $this->BenefitsBelongToCoverAmount->coverAmountBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'benefit'=>[
                'name'=> $this->name,
                'type_of_benefit'=> $this->type_of_benefit,
                'benefit_details'=> $benefit_details,
            ]
        ];
    }
}
