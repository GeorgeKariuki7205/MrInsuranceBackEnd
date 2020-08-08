<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Additional\AdditionalBenefit;
 
class HealthAdditionalBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefits = [
           [
               'additional_id'=> 1,
               'name'=> 'Eye Check-Ups',
           ],
           [
            'additional_id'=> 1,
            'name'=> 'Glasses',
        ]
        ];
        foreach($benefits as $key => $value){

            Benefits::create($value);            

        }
    }
}
