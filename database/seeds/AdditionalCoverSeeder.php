<?php

use Illuminate\Database\Seeder;
use App\MotorInsuranceModels\AdditionalCover;
class AdditionalCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $additioalCovers = [
            [
                'insurance_cover_id'=> 3,
                'name'=> 'Terrorism, Sabotage & Political Risks',
                'description'=> 'Terrorism, Sabotage & Political Risks',
                'min_amount'=> 0,
                'rate'=> 0.25,
                'value'=> 0,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'Excess Protector (Own Damage)',
                'description'=> 'Excess Protector (Own Damage)',
                'min_amount'=> 0,
                'rate'=> 0.25,
                'value'=> 0,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'Excess Protector (Own Damage)',
                'description'=> 'Excess Protector (Own Damage)',
                'min_amount'=> 0,
                'rate'=> 1,
                'value'=> 0,
            ],


            [
                'insurance_cover_id'=> 4,
                'name'=> 'Terrorism, Sabotage & Political Risks',
                'description'=> 'Terrorism, Sabotage & Political Risks',
                'min_amount'=> 3000,
                'rate'=> 0.35,
                'value'=> 0,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'Excess Protector (Own Damage)',
                'description'=> 'Excess Protector (Own Damage)',
                'min_amount'=> 0,
                'rate'=> 0.5,
                'value'=> 0,
            ],
            [
                'insurance_cover_id'=> 3,
                'name'=> 'Excess Protector (Own Damage)',
                'description'=> 'Excess Protector (Own Damage)',
                'min_amount'=> 0,
                'rate'=> 1,
                'value'=> 0,
            ],
            
        ];

        foreach($additioalCovers as $key => $value){

            AdditionalCover::create($value);            

        }
    }
}
