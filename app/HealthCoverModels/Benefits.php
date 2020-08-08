<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

     public function BenefitsBelongToCoverAmount()
     {
         return $this->belongsTo('App\HealthCoverModels\CoverAmount', 'covered_amount_id', 'id');
     }
}
