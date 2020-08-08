<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Additional\HealthAdditionalNotCovered;
class HealthAdditionalNotCoveredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notCovered = [
            [
                'additional_id'=> 1,
                'name'=> 'Glasses More Than 12,000/=',
            ],
            [
                'additional_id'=> 1,
                'name'=> 'Retinal Transplant',
            ]
        ];
        foreach($notCovered as $key => $value){

            HealthAdditionalNotCovered::create($value);            

        }
    }
}
