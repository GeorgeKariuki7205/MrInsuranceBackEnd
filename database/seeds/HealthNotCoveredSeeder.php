<?php

use Illuminate\Database\Seeder;
use App\HealthCoverModels\HealthNotCovered;
class HealthNotCoveredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notCovered = [
            [
                'name'=> 'Treatment outside Afyaimara County Panel.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Maternity expenses unless beneﬁt is purchased',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Amounts recoverable from other insurances such as NHIF, GPA.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Expenses where material information is withheld or misstated',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Beneﬁts not speciﬁed in the brochure and policy.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Treatment by any other than a certiﬁed medical practitioner.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Expenses incurred in connection with active participation in riots, civil unrest etc.',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Self-inﬂicted injury and attempted suicide ',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Medical Costs due to experimental treatment',
                'insurance_covers_id'=> 1
            ],
            [
                'name'=> 'Cosmetic surgery ',
                'insurance_covers_id'=> 1
            ],

            // ! second 

            [
                'name'=> 'Treatment outside Afya Kwa Jamii County Panel.',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Maternity expenses unless beneﬁt is purchased',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Amounts recoverable from other insurances such as NHIF, GPA.',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Expenses where material information is withheld or misstated',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Beneﬁts not speciﬁed in the brochure and policy.',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Treatment by any other than a certiﬁed medical practitioner.',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Expenses incurred in connection with active participation in riots, civil unrest etc.',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Self-inﬂicted injury and attempted suicide ',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Medical Costs due to experimental treatment',
                'insurance_covers_id'=> 2
            ],
            [
                'name'=> 'Cosmetic surgery ',
                'insurance_covers_id'=> 2
            ],
        ];
        foreach($notCovered as $key => $value){

            HealthNotCovered::create($value);            

        }
    }
}
