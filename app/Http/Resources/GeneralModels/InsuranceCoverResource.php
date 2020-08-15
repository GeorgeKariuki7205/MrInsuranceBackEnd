<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceCoverResource extends JsonResource
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
            'company_id'=>$this->InsuranceProviderBelongToCompany->name,
            'cover_id'=>$this->InsuranceProviderBelongsToCover->name,
            'status'=>$this->is_active,
            'year'=>$this->year
        ];
    }
}
