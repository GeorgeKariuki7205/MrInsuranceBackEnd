<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class CoverRequirement extends Model
{
    public $table = "cover_requirements";
    protected $guarded = ["id"];

    public function CoverRequirementsHasManyCoverQuestions()
    {
        return $this->hasMany('App\GeneralModels\CoverQuestion', 'cover_requirement_id', 'id');
    }
}
