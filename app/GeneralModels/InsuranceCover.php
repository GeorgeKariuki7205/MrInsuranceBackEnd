<?php

namespace App\GeneralTables;

use Illuminate\Database\Eloquent\Model;

class InsuranceCover extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

     public function InsuranceProviderBelongToCompany()
     {
         return $this->belongsTo('App\Company', 'company_id', 'id');
     }

     public function InsuranceProviderBelongsToCover()
     {
         return $this->belongsTo('App\Cover', 'cover_id', 'id');
     }
}
