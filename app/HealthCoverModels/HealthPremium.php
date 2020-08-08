<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class HealthPremium extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

     public function PremiumBelongsToCoverAmount()
     {
         return $this->belongsTo('App\HealthCoverModels\CoverAmount', 'covered_amount_id', 'id');
     }
}
