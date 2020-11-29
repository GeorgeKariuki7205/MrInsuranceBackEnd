<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\CommercialVehicles\CommercialComprehensiveCost;
class CommercialComprehensiveCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $commercialCompreheniveCost = [
            [
                'commercial_class_id'=>1,
                'sum_insured_from_value'=>0,
                'sum_insured_to_value'=>3000000,    
                'rate'=>4.50
            ],
            [
                'commercial_class_id'=>1,
                'sum_insured_from_value'=>3000001,
                'sum_insured_to_value'=>0,    
                'rate'=>4.25
            ],
            [
                'commercial_class_id'=>2,
                'sum_insured_from_value'=>0,
                'sum_insured_to_value'=>3000000,    
                'rate'=>5.75
            ],
            [
                'commercial_class_id'=>2,
                'sum_insured_from_value'=>3000001,
                'sum_insured_to_value'=>7000000,    
                'rate'=>5.25
            ],
            [
                'commercial_class_id'=>2,
                'sum_insured_from_value'=>7000001,
                'sum_insured_to_value'=>0,    
                'rate'=>4.25
            ],
            [
                'commercial_class_id'=>3,
                'sum_insured_from_value'=>0,
                'sum_insured_to_value'=>3000000,    
                'rate'=>3
            ],
            [
                'commercial_class_id'=>3,
                'sum_insured_from_value'=>3000001,
                'sum_insured_to_value'=>0,    
                'rate'=>2.5
            ],
            [
                'commercial_class_id'=>4,
                'sum_insured_from_value'=>0,
                'sum_insured_to_value'=>2000000,    
                'rate'=>7.5
            ],
            [
                'commercial_class_id'=>4,
                'sum_insured_from_value'=>2000001,
                'sum_insured_to_value'=>0,    
                'rate'=>6
            ],
            [
                'commercial_class_id'=>5,
                'sum_insured_from_value'=>600000,
                'sum_insured_to_value'=>0,    
                'rate'=>4
            ],
            [
                'commercial_class_id'=>6,
                'sum_insured_from_value'=>600000,
                'sum_insured_to_value'=>0,    
                'rate'=>4
            ],
            [
                'commercial_class_id'=>7,
                'sum_insured_from_value'=>600000,
                'sum_insured_to_value'=>0,    
                'rate'=>4
            ],
            [
                'commercial_class_id'=>8,
                'sum_insured_from_value'=>600000,
                'sum_insured_to_value'=>0,    
                'rate'=>12.5
            ],
        ];
       
        foreach($commercialCompreheniveCost as $key => $value){

            CommercialComprehensiveCost::create($value);

        }
    }
}
