<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\Benefit;
class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $benefits = [
            [
                'insurance_cover_id'=> 3,
                'name'=> 'WINDSCREEN',
                'description'=> 'WINDSCREEN',
                'amount'=> 50000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'RADIO CASSETTE',
                'description'=> 'RADIO CASSETTE',
                'amount'=> 50000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'TOWING EXPENSES',
                'description'=> 'TOWING EXPENSES',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'AUTHORISED REPAIR LIMIT',
                'description'=> 'AUTHORISED REPAIR LIMIT',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'MEDICAL EXPENSES',
                'description'=> 'MEDICAL EXPENSES',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'THIRD PARTY PROPERTY DAMAGE',
                'description'=> 'THIRD PARTY PROPERTY DAMAGE PER PERSON.',
                'amount'=> 5000000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'THIRD PARTY BODILY INJURIES',
                'description'=> 'THIRD PARTY BODILY INJURIES PER PERSON.',
                'amount'=> 3000000,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'PASSENGER LEGAL LIABILITY ',
                'description'=> 'PASSENGER LEGAL LIABILITY .',
                'amount'=> 3000000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'WINDSCREEN',
                'description'=> 'WINDSCREEN',
                'amount'=> 50000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'RADIO CASSETTE',
                'description'=> 'RADIO CASSETTE',
                'amount'=> 50000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'TOWING EXPENSES',
                'description'=> 'TOWING EXPENSES',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'AUTHORISED REPAIR LIMIT',
                'description'=> 'AUTHORISED REPAIR LIMIT',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'MEDICAL EXPENSES',
                'description'=> 'MEDICAL EXPENSES',
                'amount'=> 30000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'THIRD PARTY PROPERTY DAMAGE',
                'description'=> 'THIRD PARTY PROPERTY DAMAGE PER PERSON.',
                'amount'=> 5000000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'THIRD PARTY BODILY INJURIES',
                'description'=> 'THIRD PARTY BODILY INJURIES PER PERSON.',
                'amount'=> 3000000,
            ],
            [
                'insurance_cover_id'=> 4,
                'name'=> 'PASSENGER LEGAL LIABILITY ',
                'description'=> 'PASSENGER LEGAL LIABILITY .',
                'amount'=> 3000000,
            ],
            
        ];

        foreach($benefits as $key => $value){

            Benefit::create($value);            

        }
    }
}
