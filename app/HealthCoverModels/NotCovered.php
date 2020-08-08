<?php

namespace App\HealthCoverModels;

use Illuminate\Database\Eloquent\Model;

class NotCovered extends Model
{
    // ! defining fillable fields.
    protected $guarded = ['id'];

    // ? Creating the relationships.

    public function NotCoveredBelongsToInsuranceCover()
    {
        return $this->belongsTo('App\GeneralModels\InsuranceCover', 'insurance_covers_id', 'id');
    }
}
