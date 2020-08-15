<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class CoverQuestion extends Model
{
    protected $guarded = ['id'];

    public function CoverQuestionBelongsToCover()
    {
        return $this->belongsTo('App\GeneralModels\Cover', 'cover_id', 'id');
    }

    public function CoverQuestionBelongsToSubCategory()
    {
        return $this->belongsTo('App\GeneralModels\SubCategoryCover', 'sub_category_id', 'id');
    }
    public function coverQuestionBelongsToCoverRequirement()
    {
        return $this->belongsTo('App\GeneralModels\CoverRequirement', 'cover_requirement_id', 'id');
    }
}
