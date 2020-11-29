<?php

namespace App\Http\Resources\MotorModels;

use Illuminate\Http\Resources\Json\JsonResource;

class AdditionalCoversResource extends JsonResource
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
            'company'=>$this->additionalMotorCoverBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name,            
            'cover'=>$this->additionalMotorCoverBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name, 
            'name'=> $this->name,
            'description'=>$this->description,        
            'min_amount'=>$this->min_amount,       
            'rate'=>$this->rate,               
            'value'=>$this->value,
        ];
    }
}
