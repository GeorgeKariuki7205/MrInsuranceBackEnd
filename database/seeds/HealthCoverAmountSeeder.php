<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\CoverAmount;
// use App\HealthCoverModels\CoverAmount;
class HealthCoverAmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coverAmounts = [
            [
               'insurance_cover_id' => 1,
               'amount' => 100000,
            ],
            [
                'insurance_cover_id' => 1,
                'amount' => 250000,
            ],
            [
                'insurance_cover_id' => 1,
                'amount' => 500000,
            ],
            [
                'insurance_cover_id' => 1,
                'amount' => 1000000,
             ]
        ];
        foreach($coverAmounts as $key => $value){

            CoverAmount::create($value);            

        }
    }
}
