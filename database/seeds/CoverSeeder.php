<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\Cover;
class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $covers = [
            [
                'name'=> 'Health Insurance',
                'description'=> 'Health Insurance',
                'has_sub_categories'=> 1,                
                'icon'=>'fa-hospital',
                'route_name'=>'Health'
            ],
            [
                'name'=> 'Motor Insurance',
                'description'=> 'Motor Insurance',
                'has_sub_categories'=> 1,
                'icon'=>'fa-car',
                'route_name'=>'Motor'
            ]
        ];
        foreach($covers as $key => $value){

            Cover::create($value);            

        }
    }
}
