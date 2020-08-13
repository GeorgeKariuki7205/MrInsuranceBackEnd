<?php

namespace App\GeneralModels;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
        // ! defining fillable fields.
        protected $guarded = ['id'];

        // ? Creating the relationships. 

        public function coverHasManySubCategories()
        {
            return $this->hasMany('App\GeneralModels\SubCategoryCover', 'cover_id', 'id');
        }

        public function coverHasManyInsuranceCover()
        {
            return $this->hasMany('App\GeneralModels\InsuranceCover', 'cover_id', 'id');
        }

        public function CoverHasManyQuestions()
        {
            return $this->hasMany('App\GeneralModels\CoverQuestion', 'cover_id', 'id');
        }
}
