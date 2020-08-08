<?php

namespace App\Http\Resources\GeneralModels;

use Illuminate\Http\Resources\Json\JsonResource;

class CoverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cover_children = null;
        if ($this->has_sub_categories == 0) {
            # code...
            $cover_children = "no";
        } else if($this->has_sub_categories == 1) {
            # code...
            $cover_children = "yes";
        }
        
        return [
            'name'=> $this->name,
            'description' => $this->description,
            'cover_children' => $cover_children,
        ];
    }
}
