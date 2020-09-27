<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\PrivateVehicles\PrivateThirdPartyCover;
class PrivateThirdPartyCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $privateThirdParty = [
            [

             'private_cost_id'=> 1,
             'cost'=> 7500,
            ]
        ];
        foreach($privateThirdParty as $key => $value){

            PrivateThirdPartyCover::create($value);            

        }
    }
}
