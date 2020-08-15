<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Additional\HealthAdditionalBenefit;
 
class HealthAdditionalBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $benefits = [
           [
               'additional_id'=> 2,
               'name'=> 'Normal Delivery ',
           ],
           [
            'additional_id'=> 2,
            'name'=> 'Caesarian Section',
           ],
           [
            'additional_id'=> 2,
            'name'=> 'Maternity Related Complications',
           ],
           [
            'additional_id'=> 2,
            'name'=> 'Antenatal & Postnatal expenses',
           ],
        ];
        foreach($benefits as $key => $value){

            HealthAdditionalBenefit::create($value);            

        }
    }
}
