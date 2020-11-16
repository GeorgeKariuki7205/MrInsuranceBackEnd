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
                  'name'=> 'OUTPATIENT COVER',
                  'type_of_calculation'=> 1,
               ],
               [
                'insurance_covers_id'=> 1,
                'name'=> 'MATERNITY COVER OPTION ',
                'type_of_calculation'=> 0,
             ],
             [
                'insurance_covers_id'=> 2,
                'name'=> 'OUTPATIENT COVER',
                'type_of_calculation'=> 1,
             ],
             [
              'insurance_covers_id'=> 2,
              'name'=> 'MATERNITY COVER OPTION ',
              'type_of_calculation'=> 0,
           ],


             [
                'insurance_covers_id'=> 1,
                'name'=> 'MATERNITY COVER OPTION 2',
                'type_of_calculation'=> 0,
             ],
            
        ];
        foreach($additional as $key => $value){

            HealthAdditional::create($value);            

        }
    }
}
