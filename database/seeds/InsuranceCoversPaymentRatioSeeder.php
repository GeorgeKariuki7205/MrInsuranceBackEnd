<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\CoverPaymentRatio;
class InsuranceCoversPaymentRatioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $coverPaymentRatios = [
            [
                'cover_id'=>2,
                'percentage'=>40,
                'next_payment_scheduel'=>1,
                'period'=>'months',
                'description'=>'First Payment',
            ],
            [
                'cover_id'=>2,
                'percentage'=>30,
                'next_payment_scheduel'=>1,
                'period'=>'months',
                'description'=>'Second Payment',
            ],
            [
                'cover_id'=>2,
                'percentage'=>30,
                'next_payment_scheduel'=>1,
                'period'=>'months',
                'description'=>'Third Payment',
            ],

        ];

        foreach($coverPaymentRatios as $key => $value){

            CoverPaymentRatio::create($value);            

        }
    }
}
