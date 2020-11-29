<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\CommercialVehicles\CommercialClass;
class CommercialClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $commercialClasses = [
            [
                'insurance_cover_id'=> 4,
                'name'=> 'General Commercial Insurance',
                'description'=> 'General Commercial Insurance',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 600000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'General General Cartage',
                'description'=> 'General General Cartage',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 1000000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'Special Vehicles (Agricultural || Forestry Vehicles) ',
                'description'=> 'Special Vehicles (Agricultural || Forestry Vehicles) ',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 0,
                'minimum_premium_amount'=> 0,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'Chauffer Driven Vehicles  (0804)',
                'description'=> 'Chauffer Driven Vehicles  (0804)',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 700000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'Institutional Vehicles (0813)',
                'description'=> 'Institutional Vehicles (0813)',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 800000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'Driving School Vehicles  Light Vehicles (0812)',
                'description'=> 'Driving School Vehicles  Heavy Vehicles',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 600000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'Driving School Vehicles  Heavy Vehicles (0812)',
                'description'=> 'Driving School Vehicles  Heavy Vehicles',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 600000,
                'minimum_premium_amount'=> 30000,                
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'General Cartege Tankers',
                'description'=> 'General Cartege Tankers',
                'hasThirdParty'=> 1,
                'min_sum_insured'=> 600000,
                'minimum_premium_amount'=> 0,                
            ],
            
        ];

        foreach($commercialClasses as $key => $value){

            CommercialClass::create($value);

        }
    }
}
