<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Additional\HealthAdditional;
class HealthAdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $additional = [
            
               [
                  'insurance_covers_id'=> 1,
                  'name'=> 'Optician',
                  'type_of_calculation'=> 1,
               ],
               [
                'insurance_covers_id'=> 1,
                'name'=> 'Dental',
                'type_of_calculation'=> 1,
             ],
            
        ];
        foreach($additional as $key => $value){

            HealthAdditional::create($value);            

        }
    }
}
