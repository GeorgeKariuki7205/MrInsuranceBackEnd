<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class SubCategoryCover extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships. 
    
    public function SubCategoryBelongsToCover()
    {
        return $this->belongsTo('App\GeneralModels\Cover', 'cover_id', 'id');
    }
    public function SubCategoryHasManyInsuranceCovers()
    {
        return $this->hasMany('App\GeneralModels\InsuranceCover', 'sub_category_id', 'id');
    } 
}
