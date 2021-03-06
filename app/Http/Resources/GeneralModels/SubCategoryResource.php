<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'cover_name'=>$this->SubCategoryBelongsToCover,
            'name'=>$this->name,
            'description'=>$this->description,
            
        ];
    }
}
