<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'imageUrl' => $this->imageLocation,
            'companyPointsPerson' => $this->companyPointsPerson,
            'description' => $this->description.strlen($this->description) > 0 ? $this->description.str_len(): null,
        ];
    }
}
