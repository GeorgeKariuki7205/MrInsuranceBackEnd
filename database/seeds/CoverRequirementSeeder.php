<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\CoverRequirement;

class CoverRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coverRequirements = [
            [
                'name'=> 'principal_member_age',
                'required'=> 1,               
            ],
            [
                'name'=> 'spouse_age',
                'required'=> 0,               
            ],
            [
                'name'=>'pre_existing_condition',
                'required'=> 0,
            ],
            [
                'name'=>'cover_amount',
                'required'=> 1,
            ],
            [
                'name'=>'number_of_dependant',
                'required'=> 0,
            ],                        
        ];

        foreach($coverRequirements as $key => $value){

            CoverRequirement::create($value);            

        }
    }
}
