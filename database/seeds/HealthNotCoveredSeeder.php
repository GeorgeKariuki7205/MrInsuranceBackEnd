<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\HealthNotCovered;
class HealthNotCoveredSeeder extends Seeder
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
                'name'=> 'Not Covering Wedding Accidents.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Not Covering Aeroplane Accidents.',
                'insurance_covers_id'=> 1
            ],
        ];
        foreach($notCovered as $key => $value){

            HealthNotCovered::create($value);            

        }
    }
}
