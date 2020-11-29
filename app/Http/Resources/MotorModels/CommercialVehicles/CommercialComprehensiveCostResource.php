<?php

namespace App\Http\Resources\MotorModels\CommercialVehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialComprehensiveCostResource extends JsonResource
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

            'sum_insured_from_value'=>$this->sum_insured_from_value,
            'sum_insured_to_value'=>$this->sum_insured_to_value,
            'commercial_class_id'=>$this->commercial_class_id,
            'rate'=>$this->rate,
        ];
    }
}
