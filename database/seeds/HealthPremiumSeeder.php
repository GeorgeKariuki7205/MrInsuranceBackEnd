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

        $premiumsInsurance2 = [
         [
            'min_age'=> 19,
            'max_age'=> 29,
            'covered_amount_id'=> 5,
            'principal_member'=> 5270,
            'spouse'=> 4397,
            'child'=> 2297,               
         ],
         [
             'min_age'=> 19,
             'max_age'=> 29,
             'covered_amount_id'=> 6,
             'principal_member'=> 5039,
             'spouse'=> 5057,
             'child'=> 2808,               
          ],
          [
             'min_age'=> 19,
             'max_age'=> 29,
             'covered_amount_id'=> 7,
             'principal_member'=> 9658,
             'spouse'=> 8170,
             'child'=> 4537,               
          ],
          [
             'min_age'=> 19,
             'max_age'=> 29,
             'covered_amount_id'=> 8,
             'principal_member'=> 10973,
             'spouse'=> 9035,
             'child'=> 5719,               
          ],
          [
             'min_age'=> 30,
             'max_age'=> 40,
             'covered_amount_id'=> 5,
             'principal_member'=> 5554,
             'spouse'=> 4501,
             'child'=> 2397,               
          ],
          [
             'min_age'=> 30,
             'max_age'=> 40,
             'covered_amount_id'=> 6,
             'principal_member'=> 6258,
             'spouse'=> 5186,
             'child'=> 2708,               
          ],
          [
             'min_age'=> 30,
             'max_age'=> 40,
             'covered_amount_id'=> 7,
             'principal_member'=> 10165,
             'spouse'=> 8480,
             'child'=> 4437,               
          ],
          [
             'min_age'=> 30,
             'max_age'=> 40,
             'covered_amount_id'=> 8,
             'principal_member'=> 10553,
             'spouse'=> 9505,
             'child'=> 5719,               
          ],
          [
             'min_age'=> 41,
             'max_age'=> 50,
             'covered_amount_id'=> 5,
             'principal_member'=> 6728,
             'spouse'=> 5539,
             'child'=> 2397,               
          ],
          [
             'min_age'=> 41,
             'max_age'=> 50,
             'covered_amount_id'=> 6,
             'principal_member'=> 7578,
             'spouse'=> 6241,
             'child'=> 2708,               
          ],
          [
             'min_age'=> 41,
             'max_age'=> 50,
             'covered_amount_id'=> 7,
             'principal_member'=> 12311,
             'spouse'=> 10197,
             'child'=> 4437,               
          ],
          [
             'min_age'=> 41,
             'max_age'=> 50,
             'covered_amount_id'=> 8,
             'principal_member'=> 13851,
             'spouse'=> 11422,
             'child'=> 5719,               
          ],
          [
             'min_age'=> 51,
             'max_age'=> 65,
             'covered_amount_id'=> 5,
             'principal_member'=> 8509,
             'spouse'=> 6978,
             'child'=> 2397,               
          ],
          [
             'min_age'=> 51,
             'max_age'=> 65,
             'covered_amount_id'=> 6,
             'principal_member'=> 9781,
             'spouse'=> 7851,
             'child'=> 2708,               
          ],
          [
             'min_age'=> 51,
             'max_age'=> 65,
             'covered_amount_id'=> 7,
             'principal_member'=> 15286,
             'spouse'=> 12472,
             'child'=> 4437,               
          ],
          [
             'min_age'=> 51,
             'max_age'=> 65,
             'covered_amount_id'=> 8,
             'principal_member'=> 17491,
             'spouse'=> 14362,
             'child'=> 5719,               
          ],
          
     ];
     foreach($premiumsInsurance2 as $key => $value){

      HealthPremium::create($value);            

  }  
    }
}
