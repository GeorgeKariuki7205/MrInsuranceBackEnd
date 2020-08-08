<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Additional\HealthAdditionalPremium;
class HealthAdditionlPremiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $premium = [
            
            [
                'additional_id'=> 1,
                'limit'=> 100000,
                'cost'=> 8000,                
            ]
        
    ];
    foreach($premium as $key => $value){

        HealthAdditionalPremium::create($value);            

    }
    }
}
