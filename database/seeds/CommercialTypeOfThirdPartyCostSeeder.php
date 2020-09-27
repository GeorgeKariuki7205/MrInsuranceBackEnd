<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\CommercialVehicles\CommercialTypeOfThirdPartyCost;
class CommercialTypeOfThirdPartyCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $typeOfThirdPartyCosts = [
            [
                'name'=> 'tons',
                'description'=> 'Tonnes',
            ],
            [
                'name'=> 'passengers',
                'description'=> 'Passengers',
            ],
        ];

        foreach($typeOfThirdPartyCosts as $key => $value){

            CommercialTypeOfThirdPartyCost::create($value);

        }
    }
}
