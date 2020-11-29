<?php

namespace App\Http\Resources\MotorModels;

use Illuminate\Http\Resources\Json\JsonResource;

class MotorBenefitsResource extends JsonResource
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
            'id'=>$this->id,               
            'company'=>$this->motorInsuranceBenefitBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,            
            'cover'=>$this->motorInsuranceBenefitBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name,
            'name'=>$this->name,      
            'description'=>$this->description,
            'amount'=>$this->amount,
        ];
    }
}
