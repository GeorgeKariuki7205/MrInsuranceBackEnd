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
            ],
            [
                'name' => "Senior Health",
                'description'=> "This is the description of the Senior Health Option.",
                'cover_id' => 1,                
            ],
            [
                'name' => "Adult Health",
                'description'=> "This is the description of the Adult Health Option.",
                'cover_id' => 1,                
            ]
        ];
        foreach($subCategories as $key => $value){

            SubCategoryCover::create($value);            

        }
       
    }
}
