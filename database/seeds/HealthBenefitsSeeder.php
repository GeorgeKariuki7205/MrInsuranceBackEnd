<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\HealthBenefit;

class HealthBenefitsSeeder extends Seeder
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
                'covered_amount_id' => 1,
                'name'=> 'Gynecology Surgery',
                'type_of_benefit' => 1,
                'amount' => 10000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Dental Surgery',
                'type_of_benefit' => 1,
                'amount' => 10000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Gynecology Surgery',
                'type_of_benefit' => 1,
                'amount' => 200000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Dental Surgery',
                'type_of_benefit' => 1,
                'amount' => 20000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Gynecology Surgery',
                'type_of_benefit' => 1,
                'amount' => 300000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Dental Surgery',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Gynecology Surgery',
                'type_of_benefit' => 1,
                'amount' => 400000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Dental Surgery',
                'type_of_benefit' => 1,
                'amount' => 40000,
            ],


        ];
        foreach($benefits as $key => $value){

            HealthBenefit::create($value);            

        }
    }
}
