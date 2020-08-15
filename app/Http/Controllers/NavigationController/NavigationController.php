<?php

namespace App\Http\Controllers\NavigationController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralModels\Cover;
class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //! getting all the navigation item and the subItems. 
        $covers = Cover::all();

        $navigation = array();
        
        foreach ($covers as $cover) {  
            $coverData = array();                      
            $coverData['cover'] = $cover->name;
            $coverData['description'] = $cover->description;
            $coverData['icon'] = $cover->icon;
            
            if ($cover->has_sub_categories == 1) {
                # code...                                
                $subCategoriesForCover = $cover->coverHasManySubCategories;                
                $subCategoriesMajorArray = array();
                foreach ($subCategoriesForCover as $subCategory) {
                    # code...
                    $subCategories = array();
                    $subCategories['name'] = $subCategory->name;
                    $subCategories['description'] = $subCategory->description;
                    $subCategories['icon'] = $subCategory->icon;
                    // ! getting all the questions for the subCategory. 

                    $subCategoryQuestions = $subCategory->subCategoryHasManyQuestions;
                    // return $subCategoryQuestions;
                    $subCategoryQuestionsArray = array();
                    foreach ($subCategoryQuestions as $question) {
                        # code...
                        $specificQuestionsDetail = array();
                        $specificQuestionsDetail['question'] = $question->question;
                        $specificQuestionsDetail['type'] = $question->type;                        
                        $specificQuestionsDetail['name'] = $question->coverQuestionBelongsToCoverRequirement->name;
                        $specificQuestionsDetail['required'] = $question->coverQuestionBelongsToCoverRequirement->required;
                        array_push($subCategoryQuestionsArray,$specificQuestionsDetail);
                        
                    }
                    
                    $subCategories['questions'] = $subCategoryQuestionsArray;                    
                    array_push($subCategoriesMajorArray,$subCategories);

                                             
                }                
                $coverData['subCategories'] = $subCategoriesMajorArray;                    
            }
            else{
                $questions = $cover->CoverHasManyQuestions;
                $coverQuestion = array();
                foreach ($questions as $question) {
                    # code...
                        $specificQuestionsDetail = array();
                        $specificQuestionsDetail['question'] = $question->question;
                        $specificQuestionsDetail['type'] = $question->type;
                        $specificQuestionsDetail['name'] = $question->coverQuestionBelongsToCoverRequirement->name;
                        $specificQuestionsDetail['required'] = $question->coverQuestionBelongsToCoverRequirement->required;

                        array_push($coverQuestion,$specificQuestionsDetail);
                }   
                
                $coverData['coverQuestion'] = $coverQuestion;
                
            }      
            
            array_push($navigation,$coverData);                             
        }
        
        return response($navigation,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
