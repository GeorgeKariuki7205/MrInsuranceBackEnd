<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\CoverQuestion;
class CoverQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coverQuestion = [
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Principal Member Age ?',
                'type'=> 'date',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Spouse Age ?',
                'type'=> 'date',                
                'required'=> 0,
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Number Of Children: ',
                'type'=> 'number',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Do You Have A Pre Existing Condition ? ',
                'type'=> 'checkbox',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 2,
                'question'=> 'Principal Member Age ?',
                'type'=> 'date',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 2,
                'question'=> 'Do You Have A Pre Existing Condition ? ',
                'type'=> 'checkbox',                
                'required'=> 0,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 4,               
                'question'=> 'What is the price of your Car ?  ',
                'type'=> 'number',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 4,               
                'question'=> 'Year Of Manufucture Of Your Vehicle ?  ',
                'type'=> 'number',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 4,               
                'question'=> 'Comprehensive Or Third Party Insurance Cover',
                'type'=> 'select',                
                'required'=> 1,
            ],

            [
                'cover_id'=> 2, 
                'sub_category_id'=> 5,               
                'question'=> 'What is the price of your Car ?  ',
                'type'=> 'number',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 5,               
                'question'=> 'Year Of Manufucture Of Your Vehicle ?  ',
                'type'=> 'number',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 5,               
                'question'=> 'Comprehensive Or Third Party Insurance Cover',
                'type'=> 'select',                
                'required'=> 1,
            ],
            [
                'cover_id'=> 2, 
                'sub_category_id'=> 5,               
                'question'=> 'Type Of Comprehensive Vehicle',
                'type'=> 'select',                
                'required'=> 1,
            ]

        ];
        foreach($coverQuestion as $key => $value){

            CoverQuestion::create($value);

        }
    }
}
