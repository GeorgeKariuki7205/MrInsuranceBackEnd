<?php

namespace App\Http\Controllers\GettingInsuranceCovers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralModels\Cover;
use App\GeneralModels\InsuranceCover;
use App\GeneralModels\SubCategoryCover;
use Carbon\Carbon;
class GettingInsuranceCovers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request  $request)
    {
        
        // ! creating the dummy array that is passed from the API endpoint.

            // $request = array();
            // $request['coverId'] = 1;
            // $request['subCategoryId'] = 1;

            // $insuranceCoverDetails = array();
            // $insuranceCoverDetails['cover_amount'] = 501000;
            // $insuranceCoverDetails['number_of_dependant'] = 1;
            // $insuranceCoverDetails['pre_existing_condition'] = false;
            // $insuranceCoverDetails['principal_member_age'] = "1965-08-05";
            // $insuranceCoverDetails['spouse_age'] = "1965-08-05";

            // $request['insuranceCoverDetails'] = $insuranceCoverDetails;

            // $personalDetails = array();
            // $personalDetails['email_address'] = "mail@mail.com";
            // $personalDetails['name'] = "George";
            // $personalDetails['phoneNumber'] = "0789898928";

            // $request['personalDetails'] = $personalDetails;
            
        //! this method is used to get all the insurance covers after posting from the API endpoint in the frontEnd.

        // $coverId = $request['coverId'];
        $coverId = $request->coverId;

        $gettingTheCovers = Cover::where('id',$coverId)->get();
        $cover = null;
        
        
        foreach ($gettingTheCovers as $gettingCover) {

            $cover = $gettingCover;            
            # code...
        }

        $hasSubCategories = $cover->has_sub_categories;
        $coverRoute = $cover->route_name;

        $subCategoryId = null;

        if ($hasSubCategories == 1) {
            # code...
            //* $subCategoryId = $request['subCategoryId'];
            $subCategoryId = $request->subCategoryId;
        }        
        // ! switch statement for all the insurance covers.

        switch ($coverRoute) {
            
            case 'Health':
                # code...
                    if ($subCategoryId != null) {
                        # code...
                        // ! if it is a sub Category.
                        // !  get the subCategory. 
                        $subCategoriesModel = SubCategoryCover::where('id',$subCategoryId)->get();
                        $subCategoryModel = null;
                        foreach ($subCategoriesModel as $subCategory) {
                            # code...
                            $subCategoryModel = $subCategory;
                        }

                        // ! get the insurance covers that line up with the SubCategory
                        $insuranceCovers = $subCategoryModel->SubCategoryHasManyInsuranceCovers;
                        
                        //! loop through the insurance covers to get the cover amounts. 

                        foreach ($insuranceCovers as $insuranceCover) {
                            # code...
                                // ! getting the amounts related to the insurance cover. 
                                $coverAmounts = $insuranceCover->InsuranceCoverHasManyCoverAmounts;                                
                                // ! looping through the coverAmounts to get the premiums. 
                                foreach ($coverAmounts as $coverAmount) {
                                    # code...                                    
                                    $coverAmountStatus = false;                                    
                                    if ($coverAmount->amount >= $request->insuranceCoverDetails['cover_amount']) {
                                    //* if ($coverAmount->amount >= $request['insuranceCoverDetails']['cover_amount']) {
                                        # code...                                        
                                        $coverAmountStatus = true;
                                        // ! after getting the cover amount, get the premiums that have the specific cover . 

                                        $premiums = $coverAmount->CoverAmountHasManyPremium; 

                                        // ! loop through the premiums to get one that is in the specified range of age.

                                        // ! get the age of the principal member.                                       
                                        //* $dbDate = Carbon::parse($request['insuranceCoverDetails']['principal_member_age']);
                                        $dbDate = Carbon::parse($request->insuranceCoverDetails['principal_member_age']);
                                        $diffYears = Carbon::now()->diffInYears($dbDate);                                        
                                        foreach ($premiums as $premium) {
                                            # code...
                                            if ( $diffYears <= $premium->max_age AND  $diffYears >= $premium->min_age) {
                                                # code...
                                                // ! after getting the correct premium, we now do the calculations to get the amounts that are 
                                                // ! payable.
                                                
                                                $payableCash = 0;
                                                $payableCash += $premium->principal_member;

                                                // ! checking to see if the spouse is present.
                                                //* if (isset($request['insuranceCoverDetails']['spouse_age'])) {
                                                 if (isset($request->insuranceCoverDetails['spouse_age'])) {
                                                    # code...isset($variable);
                                                    $payableCash += $premium->spouse;
                                                }

                                                // ! checking to see if the children isset.

                                                //* if (isset($request['insuranceCoverDetails']['number_of_dependant'])) {
                                                if (isset($request->insuranceCoverDetails['number_of_dependant'])) {
                                                    # code...isset($variable);
                                                    $payableCash += $premium->child*$request->insuranceCoverDetails->number_of_dependant;
                                                }                                                                                            
                                                // ! returning all the required data about the premium. 

                                                $coverDetails = array();
                                                $coverDetails['payableCash'] = $payableCash;
                                                $coverDetails['coveredAmount'] = $coverAmount->amount;
                                                $coverDetails['coverBenefits'] = $coverAmount->CoveredAmountHasManyBenefits;
                                                $coverDetails['waitingPeriod'] = $insuranceCover->InsuranceCoverHasManyWaitingPeriods;
                                                $coverDetails['notCovered'] = $insuranceCover->InsuranceCoverHasManyNotCovered;                                                

                                            break;
                                            }
                                        }


                                    break;
                                    
                                    }
                                }                                
                        }

                        return response($coverDetails,200);
                        
                    }
                break;
            
            default:
                # code...
                break;
        }

        


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
