<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\Premium;
class HealthPremiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $premiums = [
            [
               'min_age'=> 19,
               'max_age'=> 29,
               'covered_amount_id'=> 1,
               'principal_member'=> 5370,
               'spouse'=> 4497,
               'child'=> 2497,
               

            ]
        ];
        foreach($premiums as $key => $value){

            Premium::create($value);            

        }
    }
}
