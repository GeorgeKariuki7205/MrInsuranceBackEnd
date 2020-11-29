<?php

namespace App\Http\Resources\MotorModels\CommercialVehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialThirdPartyTypeOfCostResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->description,
        ];
    }
}
