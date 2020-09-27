<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\PrivateVehicles\PrivateComprehensiveCover;
class PrivateComprehensiveCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $privareComprehensive = [
            [
                   'private_cost_id'=> 1,
                    'min_sum_insured'=> 600000,
                    'sum_insured_from_value'=> 600000,
                    'sum_insured_to_value'=>1000000,
                    'rate'=> 5,
                    'minimum_premium_amount'=> 25000,                    
            ],
            [
                'private_cost_id'=> 1,
                 'min_sum_insured'=>1000000,
                 'sum_insured_from_value'=>1000000,
                 'sum_insured_to_value'=>2000000,
                 'rate'=>4.5,
                 'minimum_premium_amount'=>25000,              
         ],
         [
            'private_cost_id'=> 1,
             'min_sum_insured'=> 2000001,
             'sum_insured_from_value'=>2000001,
             'sum_insured_to_value'=> 3000000,
             'rate'=>3.75,
             'minimum_premium_amount'=>25000,             
     ],
     [
        'private_cost_id'=> 1,
         'min_sum_insured'=> 3000001,
         'sum_insured_from_value'=>3000001,
         'sum_insured_to_value'=> 0,
         'rate'=>3.25,
         'minimum_premium_amount'=>25000,             
 ],
        ];

        foreach($privareComprehensive as $key => $value){

            PrivateComprehensiveCover::create($value);            

        }
    }
}
