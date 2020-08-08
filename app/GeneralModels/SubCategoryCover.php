<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class SubCategoryCover extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships. 

    public function subCategoryBelongsToCover()
    {
        return $this->belongsTo('App\Cover', 'cover_id', 'id');
    }    
}
