<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\HealthPremium;
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
            ],
            [
                'min_age'=> 19,
                'max_age'=> 29,
                'covered_amount_id'=> 2,
                'principal_member'=> 6039,
                'spouse'=> 5057,
                'child'=> 2808,               
             ],
             [
                'min_age'=> 19,
                'max_age'=> 29,
                'covered_amount_id'=> 3,
                'principal_member'=> 9758,
                'spouse'=> 8170,
                'child'=> 4537,               
             ],
             [
                'min_age'=> 19,
                'max_age'=> 29,
                'covered_amount_id'=> 4,
                'principal_member'=> 10973,
                'spouse'=> 9135,
                'child'=> 5819,               
             ],
             [
                'min_age'=> 30,
                'max_age'=> 40,
                'covered_amount_id'=> 1,
                'principal_member'=> 5654,
                'spouse'=> 4701,
                'child'=> 2497,               
             ],
             [
                'min_age'=> 30,
                'max_age'=> 40,
                'covered_amount_id'=> 2,
                'principal_member'=> 6358,
                'spouse'=> 5286,
                'child'=> 2808,               
             ],
             [
                'min_age'=> 30,
                'max_age'=> 40,
                'covered_amount_id'=> 3,
                'principal_member'=> 10265,
                'spouse'=> 8580,
                'child'=> 4537,               
             ],
             [
                'min_age'=> 30,
                'max_age'=> 40,
                'covered_amount_id'=> 4,
                'principal_member'=> 11553,
                'spouse'=> 9605,
                'child'=> 5819,               
             ],
             [
                'min_age'=> 41,
                'max_age'=> 50,
                'covered_amount_id'=> 1,
                'principal_member'=> 6828,
                'spouse'=> 5639,
                'child'=> 2497,               
             ],
             [
                'min_age'=> 41,
                'max_age'=> 50,
                'covered_amount_id'=> 2,
                'principal_member'=> 7678,
                'spouse'=> 6341,
                'child'=> 2808,               
             ],
             [
                'min_age'=> 41,
                'max_age'=> 50,
                'covered_amount_id'=> 3,
                'principal_member'=> 12411,
                'spouse'=> 10297,
                'child'=> 4537,               
             ],
             [
                'min_age'=> 41,
                'max_age'=> 50,
                'covered_amount_id'=> 4,
                'principal_member'=> 13951,
                'spouse'=> 11522,
                'child'=> 5819,               
             ],
             [
                'min_age'=> 51,
                'max_age'=> 65,
                'covered_amount_id'=> 1,
                'principal_member'=> 8609,
                'spouse'=> 7078,
                'child'=> 2497,               
             ],
             [
                'min_age'=> 51,
                'max_age'=> 65,
                'covered_amount_id'=> 2,
                'principal_member'=> 9681,
                'spouse'=> 7951,
                'child'=> 2808,               
             ],
             [
                'min_age'=> 51,
                'max_age'=> 65,
                'covered_amount_id'=> 3,
                'principal_member'=> 15386,
                'spouse'=> 12572,
                'child'=> 4537,               
             ],
             [
                'min_age'=> 51,
                'max_age'=> 65,
                'covered_amount_id'=> 4,
                'principal_member'=> 17591,
                'spouse'=> 14462,
                'child'=> 5819,               
             ],
             
        ];
        foreach($premiums as $key => $value){

            HealthPremium::create($value);            

        }
    }
}
