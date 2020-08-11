<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResourceCollection extends JsonResource
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
            'cover_name'=>$this->subCategoryBelongsToCover->name,
            'name'=>$this->name,
            'description'=>$this->description,
            
        ];
    }
}
