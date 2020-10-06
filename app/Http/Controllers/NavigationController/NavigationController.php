<?php

namespace App\Http\Controllers\NavigationController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralModels\Cover;
use App\MotorInsuranceModels\CommercialVehicles\CommercialClass;
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
            $coverData['id'] = $cover->id;                      
            $coverData['cover'] = $cover->name;
            $coverData['description'] = $cover->description;
            $coverData['icon'] = $cover->icon;
            $coverData['route_name'] = $cover->route_name;            
            if ($cover->has_sub_categories == 1) {
                # code...                                
                $subCategoriesForCover = $cover->coverHasManySubCategories;                
                $subCategoriesMajorArray = array();
                foreach ($subCategoriesForCover as $subCategory) {
                    # code...
                    $subCategories = array();
                    $subCategories['id'] = $subCategory->id;
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
                        $specificQuestionsDetail['name'] = $question->name;
                        $specificQuestionsDetail['required'] = $question->required;

                        // ! this section is used to check if the section is required for options value. 

                        if ($specificQuestionsDetail['type'] == 'select') {
                            # code...
                            // ! getting the options that are related to the commercial motor insurances. 

                            if($subCategory->id == 5 || $subCategory->id == 4){

                                if ($subCategory->id == 5 && $specificQuestionsDetail['question'] !== 'Comprehensive Or Third Party Insurance Cover') {
                                    # code...
                                    $motorInsuranceCommercialtypes = CommercialClass::all();
                                    $motorInsuranceCommercialTypesNames = array();
                                    $motorInsuranceCommercialTypesDescription = array();

                                    foreach ($motorInsuranceCommercialtypes as $motorInsuranceCommercialtype) {
                                        # code...
                                         array_push($motorInsuranceCommercialTypesNames , $motorInsuranceCommercialtype);                                         
                                        
                                    }
                                    $specificQuestionsDetail['selectValues'] = $motorInsuranceCommercialTypesNames;                                    
                                }
                                if ($specificQuestionsDetail['question'] == 'Comprehensive Or Third Party Insurance Cover'){

                                    $specificQuestionsDetail['selectName'] = ['Comprehensive Insurance Cover','Third Party Inurance Cover'];                                        

                                }
                                
                                // ! 
                            }
                        }

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
                        $specificQuestionsDetail['name'] = $question->CoverQuestionBelongsToCoverRequirement->name;
                        $specificQuestionsDetail['required'] = $question->required;

                        array_push($coverQuestion,$specificQuestionsDetail);
                }   
                
                $coverData['coverQuestion'] = $coverQuestion;
                
            }      
            
            array_push($navigation,$coverData);                             
        }
        
        return response($navigation,200);

    }
   
}
