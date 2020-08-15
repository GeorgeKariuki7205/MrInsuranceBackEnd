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
                'name'=> 'Congenital defects and genetic disorders after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Gynecological surgery (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 40000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Illness related reconstructive/plastic surgery from the third year of cover (excludes cosmetic, obstetrics and gynecology related)',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'In patient non-accident related dental surgery/ treatment (after six months of cover and subject to written pre-authorization)',
                'type_of_benefit' => 1,
                'amount' => 10000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'In patient non-accident related eye treatments excluding surgery for refractive errors and laser treatment (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 15000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Internal and external surgical implants, appliances, joint replacements and prostheses (excluding dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 60000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Non accident related maxillofacial surgery (Excluding routine dental surgery and dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Organ transplantation after two years of cover (cost of donor or securing the organ is excluded)',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Organ transplantation after two years of cover (cost of donor or securing the organ is excluded)',
                'type_of_benefit' => 1,
                'amount' => 50000,
            ],
            [
                'covered_amount_id' => 1,
                'name'=> 'Post-hospitalization treatment related to cause of pre-authorization (reimbursement only, limited to the ﬁrst 3 weeks after discharge)',
                'type_of_benefit' => 1,
                'amount' => 5000,
            ],

            // ! two 
            [
                'covered_amount_id' => 2,
                'name'=> 'Congenital defects and genetic disorders after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 75000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Gynecological surgery (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 100000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Illness related reconstructive/plastic surgery from the third year of cover (excludes cosmetic, obstetrics and gynecology related)',
                'type_of_benefit' => 1,
                'amount' => 75000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'In patient non-accident related dental surgery/ treatment (after six months of cover and subject to written pre-authorization)',
                'type_of_benefit' => 1,
                'amount' => 15000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'In patient non-accident related eye treatments excluding surgery for refractive errors and laser treatment (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 35000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Internal and external surgical implants, appliances, joint replacements and prostheses (excluding dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Non accident related maxillofacial surgery (Excluding routine dental surgery and dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 75000,
            ],
            [
                'covered_amount_id' => 2,
                'name'=> 'Organ transplantation after two years of cover (cost of donor or securing the organ is excluded)',
                'type_of_benefit' => 1,
                'amount' => 125000,
            ],           
            [
                'covered_amount_id' => 1,
                'name'=> 'Post-hospitalization treatment related to cause of pre-authorization (reimbursement only, limited to the ﬁrst 3 weeks after discharge)',
                'type_of_benefit' => 1,
                'amount' => 5000,
            ],

            // ! three
            
            [
                'covered_amount_id' => 3,
                'name'=> 'Congenital defects and genetic disorders after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Gynecological surgery (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 200000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Illness related reconstructive/plastic surgery from the third year of cover (excludes cosmetic, obstetrics and gynecology related)',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'In patient non-accident related dental surgery/ treatment (after six months of cover and subject to written pre-authorization)',
                'type_of_benefit' => 1,
                'amount' => 20000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'In patient non-accident related eye treatments excluding surgery for refractive errors and laser treatment (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 75000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Internal and external surgical implants, appliances, joint replacements and prostheses (excluding dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 300000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Non accident related maxillofacial surgery (Excluding routine dental surgery and dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Organ transplantation after two years of cover (cost of donor or securing the organ is excluded)',
                'type_of_benefit' => 1,
                'amount' => 250000,
            ],           
            [
                'covered_amount_id' => 3,
                'name'=> 'Post-hospitalization treatment related to cause of pre-authorization (reimbursement only, limited to the ﬁrst 3 weeks after discharge)',
                'type_of_benefit' => 1,
                'amount' => 15000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Newly diagnosed chronic conditions',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Pre-existing conditions and chronic conditions on full disclosure at the time of joining(one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 3,
                'name'=> 'Cancer treatment after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],

            // ! four 

            [
                'covered_amount_id' => 4,
                'name'=> 'Congenital defects and genetic disorders after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 200000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Gynecological surgery (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 300000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Illness related reconstructive/plastic surgery from the third year of cover (excludes cosmetic, obstetrics and gynecology related)',
                'type_of_benefit' => 1,
                'amount' => 150000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'In patient non-accident related dental surgery/ treatment (after six months of cover and subject to written pre-authorization)',
                'type_of_benefit' => 1,
                'amount' => 30000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'In patient non-accident related eye treatments excluding surgery for refractive errors and laser treatment (one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 75000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Internal and external surgical implants, appliances, joint replacements and prostheses (excluding dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 300000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Non accident related maxillofacial surgery (Excluding routine dental surgery and dental ﬁxtures)',
                'type_of_benefit' => 1,
                'amount' => 200000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Organ transplantation after two years of cover (cost of donor or securing the organ is excluded)',
                'type_of_benefit' => 1,
                'amount' => 300000,
            ],           
            [
                'covered_amount_id' => 4,
                'name'=> 'Post-hospitalization treatment related to cause of pre-authorization (reimbursement only, limited to the ﬁrst 3 weeks after discharge)',
                'type_of_benefit' => 1,
                'amount' => 20000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Newly diagnosed chronic conditions',
                'type_of_benefit' => 1,
                'amount' => 250000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Pre-existing conditions and chronic conditions on full disclosure at the time of joining(one year waiting period)',
                'type_of_benefit' => 1,
                'amount' => 250000,
            ],
            [
                'covered_amount_id' => 4,
                'name'=> 'Cancer treatment after one year of cover',
                'type_of_benefit' => 1,
                'amount' => 250000,
            ],
            
        ];
        foreach($benefits as $key => $value){

            HealthBenefit::create($value);            

        }
    }
}
