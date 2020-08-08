<?php

namespace App\HealthCoverModels\Additional;

use Illuminate\Database\Eloquent\Model;

class HealthAdditionlPremium extends Model
{
      // ! defining fillable fields.
      protected $guarded = ['id'];

      // ? Creating the relationships.
    public function AdditionalPremiumBelongsToAdditional()
     {
         return $this->belongsTo('App\HealthCoverModels\Additional\HealthAdditional', 'additional_id', 'id');
     }
}
