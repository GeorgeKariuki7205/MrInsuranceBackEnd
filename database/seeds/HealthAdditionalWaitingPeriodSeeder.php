<?php

use Illuminate\Database\Seeder;
use  App\HealthCoverModels\Additional\AdditionalWaitingPeriod;
class HealthAdditionalWaitingPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waitingPeriod = [
            [
                [
                    'additional_id'=> 1,
                    'situation'=> 'Cataracts',
                    'period_amount'=> '2',
                    'period_time'=>'months',
                ]
            ]
        ];
        foreach($waitingPeriod as $key => $value){

            AdditionalWaitingPeriod::create($value);            

        }
    }
}
