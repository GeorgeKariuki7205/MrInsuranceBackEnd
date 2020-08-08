<?php

namespace App\HealthCoverModels\Additional;

use Illuminate\Database\Eloquent\Model;

class AdditionalWaitingPeriod extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships.

    public function AdditionalWaitingPeriodBelongsToAdditional()
     {
         return $this->belongsTo('App\HealthCoverModels\Additional\AdditionalWaitingPeriod', 'additional_id', 'id');
     }
}
