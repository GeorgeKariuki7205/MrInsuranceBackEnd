<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\SubCategoryCover;
class SubCategoryCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            [
                'name' => "Family Health",
                'description'=> "This is the description of the Family Health Option.",
                'cover_id' => 1, 
                'icon'=>'group'               
            ],
            [
                'name' => "Senior Health",
                'description'=> "This is the description of the Senior Health Option.",
                'cover_id' => 1,
                'icon'=>'directions_walk'              
            ],
            [
                'name' => "Adult Health",
                'description'=> "This is the description of the Adult Health Option.",
                'cover_id' => 1,  
                'icon'=>'accessibility'              
            ],
            [
                'name' => "Private Motor Insurance.",
                'description'=> "This is the description of the Private Motor Insurance Option.",
                'cover_id' => 2,  
                'icon'=>'directions_car'              
            ],
            [
                'name' => "Commercial Motor Insurance.",
                'description'=> "This is the description of the Commercial Motor Insurance Option.",
                'cover_id' => 2,  
                'icon'=>'local_shipping'              
            ]
        ];
        foreach($subCategories as $key => $value){

            SubCategoryCover::create($value);            

        }
       
    }
}
