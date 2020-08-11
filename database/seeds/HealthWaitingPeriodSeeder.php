<?php

use Illuminate\Database\Seeder;
use  App\HealthCoverModels\HealthWaitingPeriod;
class HealthWaitingPeriodSeeder extends Seeder
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
                'insurance_covers_id'=> 1,
                'situation'=> 'Pre-existing and chronic conditions have a waiting period of 1 year.',
                'period_amount'=> 1,
                'period_time'=> 'Year'
            ],            
        ];
        foreach($waitingPeriod as $key => $value){

            HealthWaitingPeriod::create($value);            

        }
    }
}
