<?php

namespace App\HealthCoverModels\Additional;

use Illuminate\Database\Eloquent\Model;

class HealthAdditionalPremium extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships.

    public function PremiumBelongsToAdditional()
     {
         return $this->belongsTo('App\HealthCoverModels\Additional\Additional', 'additional_id', 'id');
     }
}
