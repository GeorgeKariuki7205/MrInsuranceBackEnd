<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;
class CompanyResourceCollection extends JsonResource
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
            'name' => $this->name,
            'imageUrl' => $this->imageLocation,
            'companyPointsPerson' => $this->companyPointsPerson,
            'description' => $this->description.strlen($this->description) > 0 ? $this->description.str_len(): null,
        ];
    }
}
