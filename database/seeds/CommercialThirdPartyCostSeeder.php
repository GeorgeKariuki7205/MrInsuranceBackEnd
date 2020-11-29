<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\CommercialVehicles\CommercialThirdPartyCost;
class CommercialThirdPartyCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $commercialThirdParty = [
            [
                'commercial_class_id'=> 1,
                'type_third_party_id'=> 1,
                'min_value'=> 0,
                'max_value'=> 3,
                'cost'=> 7500,                
            ],
            [
                'commercial_class_id'=> 1,
                'type_third_party_id'=> 1,
                'min_value'=> 4,
                'max_value'=> 8,
                'cost'=> 12000,                
            ],
            [
                'commercial_class_id'=> 1,
                'type_third_party_id'=> 1,
                'min_value'=> 9,
                'max_value'=> 10,
                'cost'=> 18000,                
            ],
            [
                'commercial_class_id'=> 2,
                'type_third_party_id'=> 1,
                'min_value'=> 0,
                'max_value'=> 3,
                'cost'=> 7500,                
            ],
            [
                'commercial_class_id'=> 2,
                'type_third_party_id'=> 1,
                'min_value'=> 3,
                'max_value'=> 8,
                'cost'=> 12000,                
            ],
            [
                'commercial_class_id'=> 2,
                'type_third_party_id'=> 1,
                'min_value'=> 8,
                'max_value'=> 20,
                'cost'=> 20000,                
            ],
            [
                'commercial_class_id'=> 2,
                'type_third_party_id'=> 1,
                'min_value'=> 20,
                'max_value'=> 30,
                'cost'=> 25000,                
            ],
            [
                'commercial_class_id'=> 2,
                'type_third_party_id'=> 1,
                'min_value'=> 30,
                'max_value'=> 0,
                'cost'=> 500,                
            ],
            [
                'commercial_class_id'=> 4,
                'type_third_party_id'=> 2,
                'min_value'=> 0,
                'max_value'=> 9,
                'cost'=> 7500,                
            ],
            [
                'commercial_class_id'=> 4,
                'type_third_party_id'=> 2,
                'min_value'=> 10,
                'max_value'=> 25,
                'cost'=> 12500,                
            ],
            [
                'commercial_class_id'=> 4,
                'type_third_party_id'=> 2,
                'min_value'=> 25,
                'max_value'=> 0,
                'cost'=> 12500,                
            ],
            [
                'commercial_class_id'=> 5,
                'type_third_party_id'=> 2,
                'min_value'=> 0,
                'max_value'=> 9,
                'cost'=> 7500,                
            ],
            [
                'commercial_class_id'=> 5,
                'type_third_party_id'=> 2,
                'min_value'=> 9,
                'max_value'=> 25,
                'cost'=> 12500,                
            ],
            [
                'commercial_class_id'=> 5,
                'type_third_party_id'=> 2,
                'min_value'=> 25,
                'max_value'=> 0,
                'cost'=> 15000,                
            ],
            [
                'commercial_class_id'=> 5,
                'type_third_party_id'=> 2,
                'min_value'=> 0,
                'max_value'=> 9,
                'cost'=> 7500,                
            ],
            [
                'commercial_class_id'=> 7,
                'type_third_party_id'=> 2,
                'min_value'=> 0,
                'max_value'=> 7,
                'cost'=> 17500,                
            ],
            [
                'commercial_class_id'=> 7,
                'type_third_party_id'=> 2,
                'min_value'=> 8,
                'max_value'=> 0,
                'cost'=> 20000,                
            ],

        ];
        foreach($commercialThirdParty as $key => $value){

            CommercialThirdPartyCost::create($value);
    
        }
    }

    
}
