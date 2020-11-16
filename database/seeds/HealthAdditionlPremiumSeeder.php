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
                'limit'=> 50000,
                'cost'=> 10239,                
            ],
            [
                'additional_id'=> 1,
                'limit'=> 25000,
                'cost'=> 8165,                
            ],
            [
                'additional_id'=> 1,
                'limit'=> 10000,
                'cost'=> 5053,                
            ],
            [
                'additional_id'=> 2,
                'limit'=> 40000,
                'cost'=> 9500,                
            ],
            [
                'additional_id'=> 2,
                'limit'=> 20000,
                'cost'=> 5700,                
            ],
            [
                'additional_id'=> 5,
                'limit'=> 40000,
                'cost'=> 9500,                
            ],
            [
                'additional_id'=> 5,
                'limit'=> 20000,
                'cost'=> 5700,                
            ],


            [
                'additional_id'=> 3,
                'limit'=> 50000,
                'cost'=> 10239,                
            ],
            [
                'additional_id'=> 3,
                'limit'=> 25000,
                'cost'=> 8165,                
            ],
            [
                'additional_id'=> 3,
                'limit'=> 10000,
                'cost'=> 5053,                
            ],
            [
                'additional_id'=> 4,
                'limit'=> 40000,
                'cost'=> 9500,                
            ],
            [
                'additional_id'=> 4,
                'limit'=> 20000,
                'cost'=> 5700,                
            ],
        
    ];
    foreach($premium as $key => $value){

        HealthAdditionalPremium::create($value);            

    }
    }
}
