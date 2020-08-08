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
                'situation'=> 'Broken Limbs',
                'period_amount'=> 2,
                'period_time'=> 'Weeks'
            ],
            [
                'insurance_covers_id'=> 1,
                'situation'=> 'Broken Necks',
                'period_amount'=> 2,
                'period_time'=> 'Months'
            ]
        ];
        foreach($waitingPeriod as $key => $value){

            HealthWaitingPeriod::create($value);            

        }
    }
}
