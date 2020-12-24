<?php

use Illuminate\Database\Seeder;
use App\GeneralModels\DocumentsNeeded;

class DocumentsNeededSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $documentsNeededs = [
            [
                'cover_id'=>2,
                'required'=>1,
                'name'=>'National Identification',
                'description'=>'National Identification',
            ],
            [
                'cover_id'=>2,
                'required'=>1,
                'name'=>'Log Book',
                'description'=>'Log Book',
            ],
            [
                'cover_id'=>1,
                'required'=>1,
                'name'=>'Birth Certificates',
                'description'=>'Birth Certificates',
            ],
            [
                'cover_id'=>1,
                'required'=>1,
                'name'=>'National Identification',
                'description'=>'National Identification',
            ]
        ];

        foreach($documentsNeededs as $key => $value){

            DocumentsNeeded::create($value);            

        }
    }
}
