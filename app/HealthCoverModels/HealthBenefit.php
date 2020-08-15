<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class HealthBenefit extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     public $table = "health_benefits";
     // ? Creating the relationships. 

     public function BenefitsBelongToCoverAmount()
     {
         return $this->belongsTo('App\HealthCoverModels\HealthCoverAmount', 'covered_amount_id', 'id');
     }
}
