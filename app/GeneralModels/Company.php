<?php

namespace App\GeneralTables;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     // ! defining fillable fields.
     protected $guarded = ['id'];

     // ? Creating the relationships. 

     public function CompanyHasManyInsuranceCovers()
     {
         return $this->hasMany('App\InsuranceCover', 'company_id', 'id');
     }
}
