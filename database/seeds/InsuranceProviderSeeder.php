<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\InsuranceCover;
class InsuranceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insuranceCovers = [
            [
                'name'=>"Afya Imara",                
                'company_id' => 1,
                'cover_id'=> 1,
                'is_active' => 1,
                'year'=> '2020',
                'sub_category_id'=> 1
            ],
            [
                'name'=>"Afya Kwa Jamii",                
                'company_id' => 2,
                'cover_id'=> 1,
                'is_active' => 1,
                'year'=> '2020',
                'sub_category_id'=> 1
            ],
            [
                'name'=>"Gari Njema.",                
                'company_id' => 3,
                'cover_id'=> 2,
                'is_active' => 1,
                'year'=> '2020',
                'sub_category_id'=> 3
            ],
            [
                'name'=>"Gari Njema.",                
                'company_id' => 3,
                'cover_id'=> 2,
                'is_active' => 1,
                'year'=> '2020',
                'sub_category_id'=> 4
            ]
        ];
        foreach($insuranceCovers as $key => $value){

            InsuranceCover::create($value);            

        }
    }
}
