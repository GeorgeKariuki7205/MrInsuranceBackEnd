<?php

namespace App\Http\Resources\MotorModels\CommercialVehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialThirdPartyCostResource extends JsonResource
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
        'commercial_class_id'=>$this->commercial_class_id,
        'type_third_party_id'=>$this->type_third_party_id,
        'min_value'=>$this->min_value,
        'max_value'=>$this->max_value,
        'cost'=>$this->cost,               
        'type'=>$this->type,
       ];
    }
}
