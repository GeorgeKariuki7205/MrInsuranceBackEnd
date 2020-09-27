<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\PrivateVehicles\PrivateCostDetail;
class PrivateCostDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //
        // insurance_cover_id

        $privateCostDetails = [
            [
                'insurance_cover_id' => 3,
            ],
        ];

        foreach($privateCostDetails as $key => $value){

            PrivateCostDetail::create($value);            

        }
    }
}
