<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $companies = [
            [
                'name'=> 'UAP Old Mutual',
                'imageLocation'=> 'imageLocation',
                'companyPointsPerson'=> 'John Doe',
            ],
            [
                'name'=> 'Jubilee Insurance ',
                'imageLocation'=> 'imageLocation',
                'companyPointsPerson'=> 'John Doe',
            ],
            [
                'name'=> 'APA Insurance ',
                'imageLocation'=> 'imageLocation',
                'companyPointsPerson'=> 'John Doe',
            ],
        ];
        foreach($companies as $key => $value){

            Company::create($value);

        }
    }
}
