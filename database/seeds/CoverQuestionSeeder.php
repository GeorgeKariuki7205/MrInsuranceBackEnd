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
                'type'=> 'date'
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Spouse Age ?',
                'type'=> 'date'
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Number Of Children: ',
                'type'=> 'number',
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 1,
                'question'=> 'Do You Have A Pre Existing Condition ? ',
                'type'=> 'checkbox',
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 2,
                'question'=> 'Principal Member Age ?',
                'type'=> 'date'
            ],
            [
                'cover_id'=> 1,
                'sub_category_id'=> 2,
                'question'=> 'Do You Have A Pre Existing Condition ? ',
                'type'=> 'checkbox',
            ],
            [
                'cover_id'=> 2,                
                'question'=> 'What is the price of your Car ?  ',
                'type'=> 'number',
            ],
        ];
        foreach($coverQuestion as $key => $value){

            CoverQuestion::create($value);

        }
    }
}
