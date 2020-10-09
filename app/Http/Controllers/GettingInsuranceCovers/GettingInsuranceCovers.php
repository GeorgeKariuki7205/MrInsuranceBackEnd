<?php

namespace App\Http\Controllers\GettingInsuranceCovers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GeneralModels\Cover;
use App\GeneralModels\InsuranceCover;
use App\GeneralModels\SubCategoryCover;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
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
        
        // ! creating the dummy array that is passed from the API endpoint for Health Insurance.

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
            
            // ! creating the dummy array that is passed from the API endpoint for Motor Insurance.

            // $request = array();
            // $request['coverId'] = 2;
            // $request['subCategoryId'] = 5;

            // $insuranceCoverDetails = array();

            // $insuranceCoverDetails['vehicleCost'] = 2000000;
            // $insuranceCoverDetails['yearOfManufucture'] = 2019;
            // $insuranceCoverDetails['isComprehensive'] = true;
            // $insuranceCoverDetails['classIfCommercial'] = 1;            
            // $insuranceCoverDetails['valueForCommercial'] = 20;

            // $personalDetails = array();
            // $personalDetails['email_address'] = "mail@mail.com";
            // $personalDetails['name'] = "George";
            // $personalDetails['phoneNumber'] = "0789898928";

            // $request['personalDetails'] = $personalDetails;




        //! this method is used to get all the insurance covers after posting from the API endpoint in the frontEnd.

        //* $coverId = $request['coverId'];
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
            // *$subCategoryId = $request['subCategoryId'];
            $subCategoryId = $request->subCategoryId;
        }   
        
        // ! creating the array that will hold the response. 

        $response = array();

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
                                        // *$dbDate = Carbon::parse($request['insuranceCoverDetails']['principal_member_age']);
                                        $dbDate = Carbon::parse($request->insuranceCoverDetails['principal_member_age']);
                                        $diffYears = Carbon::now()->diffInYears($dbDate);                                        
                                        foreach ($premiums as $premium) {
                                            # code...
                                            if ( $diffYears <= $premium->max_age AND  $diffYears >= $premium->min_age) {
                                                # code...
                                                // ! after getting the correct premium, we now do the calculations to get the amounts that are 
                                                // ! payable.
                                                
                                                // ! creating the array that will hold the payable amounts. 

                                                $payableBreakdown = array();
                                                $payableCash = 0;
                                                $payableCash += $premium->principal_member;
                                                $payableBreakdown['principal_member'] = $premium->principal_member;
                                                // ! checking to see if the spouse is present.
                                                // *if (isset($request['insuranceCoverDetails']['spouse_age'])) {
                                                if (isset($request->insuranceCoverDetails['spouse_age'])) {                                                    
                                                    $payableCash += $premium->spouse;
                                                    $payableBreakdown['spouse'] = $premium->spouse;
                                                }

                                                // ! checking to see if the children isset.

                                                // *if (isset($request['insuranceCoverDetails']['number_of_dependant'])) {
                                                if (isset($request->insuranceCoverDetails['number_of_dependant'])) {                                                    
                                                    $payableCash += $premium->child*$request->insuranceCoverDetails['number_of_dependant'];
                                                    //* $payableCash += $premium->child*$request['insuranceCoverDetails']['number_of_dependant'];
                                                    $dependents = array();
                                                    $dependents['dependant'] = $premium->child;
                                                    $dependents['number_of_dependents'] = $request->insuranceCoverDetails['number_of_dependant'];
                                                    //* $dependents['number_of_dependents'] = $request['insuranceCoverDetails']['number_of_dependant'];
                                                    $dependents['number_of_dependents'] = $request['insuranceCoverDetails']['number_of_dependant'];
                                                    $payableBreakdown['dependents'] = $dependents;

                                                }   
                                                
                                                // ! getting the additional Covers that are linked to the insurance cover.

                                                $additionalCovers = array();

                                                $additional = $insuranceCover->InsuranceCoverHasManyAdditional;

                                                $numberAdditional = count($additional);

                                                //! getting the exact additional.
                                                $additionalArray = array();
                                                foreach ($additional as $addition) {
                                                    # code...
                                                    $additionDetails = array();
                                                    $additionDetails['name'] = $addition->name;
                                                    $additionDetails['id'] = $addition->id;
                                                    $additionDetails['type_of_calculation'] = $addition->type_of_calculation;
                                                                                                        
                                                    // ! additional premiums involved. 
                                                    $additionDetails['additional_premia'] = $addition->AdditionalHasManyPremium;

                                                    // ! adding the benefits related to the additional.                                                                                                        
                                                    $additionDetails['additional_benefits'] = $addition->AdditionalHasManyBenefits;
                                                    
                                                    // ! adding the not covered related to the additional. 
                                                    $additionDetails['additional_not_covered'] = $addition->AdditionalHasManyNotCovered;

                                                    // ! additional Waiting periods. 
                                                    $additionDetails['additional_waiting_periods'] = $addition->AdditionalHasManyWaitingPeriod;
                                                                                                        
                                                    array_push($additionalArray,$additionDetails);
                                                }

                                                // ! returning all the required data about the premium. 

                                                $coverDetails = array();
                                                $coverDetails['uuid'] = Uuid::generate(4)->string;
                                                $coverDetails['company'] = $insuranceCover->InsuranceProviderBelongToCompany;
                                                $coverDetails['cover'] = $insuranceCover->InsuranceProviderBelongsToCover;
                                                $coverDetails['subCategory'] = $insuranceCover->InsuranceCoverBelongsToSubCategory->name;
                                                $coverDetails['insuranceCover'] = $insuranceCover->name;  
                                                $coverDetails['coveredAmount'] = $coverAmount->amount;                                              
                                                $coverDetails['payableCash'] = $payableCash; 
                                                $coverDetails['financialBreakDown'] = $payableBreakdown;                                               
                                                $coverDetails['coverBenefits'] = $coverAmount->CoveredAmountHasManyBenefits;
                                                $coverDetails['waitingPeriod'] = $insuranceCover->InsuranceCoverHasManyWaitingPeriods;
                                                $coverDetails['notCovered'] = $insuranceCover->InsuranceCoverHasManyNotCovered;                                                 
                                                $coverDetails['additionalCovers'] = $additionalArray;
                                                

                                                array_push($response,$coverDetails);
                                            break;
                                            }
                                        }


                                    break;
                                    
                                    }
                                }                                
                        }

                        
                        
                    }
                break;
                case 'Motor':
                    # code...
                    
                    // ! Motor Insurance Covers.
                    
                    
                    // ! checking if the subCategories is not null. 
                    if ($subCategoryId != null){

                        // ! getting all the insurance covers to be used later in the application . 

                        $subCategoriesModel = SubCategoryCover::where('id',$subCategoryId)->get();
                        $subCategoryModel = null;
                        foreach ($subCategoriesModel as $subCategory) {
                            # code...
                            $subCategoryModel = $subCategory;
                        }

                        
                        $insuranceCovers = $subCategoryModel->SubCategoryHasManyInsuranceCovers;

                        // ! getting the subCategory value 
                        if ($subCategoryId == 4) {
                            # code...
                            // ! THIS IS THE CATEGORY USED TO IMPLEMENT THE PRIVATE MOTOR INURANCE.

                            // ! checking to see the type of cover (comprehensive or 3rd party.)
                            // if ($insuranceCoverDetails['isComprehensive']) {
                            if ($request['insuranceCoverDetails']->isComprehensive == 1) {
                                # code...
                                // ! functionlaity to be implemented for a comprehensive Cover. 
                                                              
                                $privateVehiclesCovers = null;
                                foreach ($insuranceCovers as $insuranceCover) {
                                
                                    // ! getting the private vehicles cost details. 

                                    $privateVehiclesCovers =    $insuranceCover->InsuranceCoverHasManyPrivateVehicles;

                                    foreach ($privateVehiclesCovers as $privateVehiclesCover) {
                                        # code...
                                        $returnable = null; 
                                        $privateVehiclesCovers = $privateVehiclesCover->PrivateCostDetailsHasManyComprehensiveCost;
                                        
                                        // ! checking the vehicle that satisfies the cost that has been set. 
                                        foreach ($privateVehiclesCovers as $privateVehiclesCover) {
                                            # code...
                                            // return $insuranceCoverDetails['vehicleCost'];
                                            //* if (($insuranceCoverDetails['vehicleCost'] <= $privateVehiclesCover->sum_insured_to_value && $insuranceCoverDetails['vehicleCost'] >= $privateVehiclesCover->sum_insured_from_value) || 
                                            // *    ($privateVehiclesCover->sum_insured_to_value == 0 && $insuranceCoverDetails['vehicleCost'] >= $privateVehiclesCover->sum_insured_from_value)) {
                                            
                                            if (($request['insuranceCoverDetails']->vehicleCost <= $privateVehiclesCover->sum_insured_to_value && $request['insuranceCoverDetails']->vehicleCost >= $privateVehiclesCover->sum_insured_from_value) || 
                                            ($privateVehiclesCover->sum_insured_to_value == 0 && $request['insuranceCoverDetails']->vehicleCost >= $privateVehiclesCover->sum_insured_from_value)) {
                                                # code...
                                                $returnable = "found.";

                                                // ! amount payable calculation. 

                                                // *$amountPayable = ($privateVehiclesCover->rate * $insuranceCoverDetails['vehicleCost'])/100;
                                                $amountPayable = ($privateVehiclesCover->rate * $request['insuranceCoverDetails']->vehicleCost)/100;
                                                if ($amountPayable < $privateVehiclesCover->minimum_premium_amount) {
                                                    # code...
                                                    $amountPayable = $privateVehiclesCover->minimum_premium_amount;
                                                }

                                                // ! adding the details for the specific implmentation of the inurance cover.
                                                $coverDetails = array();
                                                $coverDetails['uuid'] = Uuid::generate(4)->string;
                                                $coverDetails['company'] = $insuranceCover->InsuranceProviderBelongToCompany;
                                                $coverDetails['cover'] = $insuranceCover->InsuranceProviderBelongsToCover;
                                                $coverDetails['subCategory'] = $insuranceCover->InsuranceCoverBelongsToSubCategory->name;
                                                $coverDetails['insuranceCover'] = $insuranceCover->name;
                                                $coverDetails['amountPayable'] = $amountPayable;
                                                array_push($response,$coverDetails); 
                                                // array_push($response,$privateVehiclesCover);                                                 
                                                break;
                                            }                                                
                                        }    
                                                                                
                                    }

                                }
                                
                                if ($returnable == null) {
                                            # code...
                                array_push($response,"No Appropriate Cover Was Found For Your Private Vehicle."); 
                                }

                            } else {
                                # code...
                                // ! THIS SECTION IS USED TO IMPLEMENT THE THIRD PARY INURANCE OF THE PRIVATE MOTOR INSURANCE. 
                                foreach ($insuranceCovers as $insuranceCover) {  

                                    $privateVehiclesCovers =    $insuranceCover->InsuranceCoverHasManyPrivateVehicles;

                                    // ! checking the vehicle that satisfies the cost that has been set. 
                                    foreach ($privateVehiclesCovers as $privateVehiclesCover) {

                                        $returnable = null; 
                                        $privateVehiclesCovers = $privateVehiclesCover->PrivateCostDetailsHasManyThirdPartyCost;

                                        foreach ($privateVehiclesCovers as $privateVehiclesCover) {
                                            # code...
                                            $coverDetails = array();
                                            $coverDetails['uuid'] = Uuid::generate(4)->string;
                                            $coverDetails['company'] = $insuranceCover->InsuranceProviderBelongToCompany;
                                            $coverDetails['cover'] = $insuranceCover->InsuranceProviderBelongsToCover;
                                            $coverDetails['subCategory'] = $insuranceCover->InsuranceCoverBelongsToSubCategory->name;
                                            $coverDetails['insuranceCover'] = $insuranceCover->name;
                                            $coverDetails['amountPayable'] = $privateVehiclesCover->cost;
                                            array_push($response,$coverDetails);
                                        }                                        
                                    }
                                }                                
                            }
                            
                        } else if($subCategoryId == 5){

                            // ! getting the class of the commercial vehicle.
                            # code...
                            //* $commercialClassID = $insuranceCoverDetails['classIfCommercial'];
                             $commercialClassID = $request['insuranceCoverDetails']->classIfCommercial;
                            // ! THIS IS THE CATEGORY USED TO IMPLEMENT THE COMMERCIAL MOTOR INURANCE.

                            if ($request['insuranceCoverDetails']['isComprehensive']) {
                                # code...
                                // ! THIS SECTION OFTHE CODE I SUSED TO IMPLEMENT COMPREHENSIVE COMMERCIAL MOTOR INSURANCE.
                                $returnable = null;
                                foreach ($insuranceCovers as $insuranceCover) {

                                    $commercialClasses =  $insuranceCover->InsuranceCoverHasManyCommercialClasses;
                                    
                                    foreach ($commercialClasses as $commercialClass) {
                                        // ! checking to see if the amount given corresponds to the minimum.  

                                        // if ($insuranceCoverDetails['vehicleCost'] < $commercialClass->min_sum_insured) {
                                            # code...
                                            
                                            if ($commercialClass->id == $commercialClassID) {
                                                # code...
                                                // ! getting the compreheive insurance details that correspond to the 
                                                // ! commercial class. 
                                                
                                                // array_push($response, $commercialClass);
                                                $commercialCompreheiveCosts = $commercialClass->CommercialClassHasManyCommerialComprehesiveCosts;
    
                                                foreach ($commercialCompreheiveCosts as $commercialCompreheiveCost) {
                                                    # code...
                                                    // commercialCompreheiveCovers
                                                    // array_push($response, $commercialCompreheiveCost);
                                                    // ! checking to get the cover that corresponds to the amount given. 
                                                    //* if ((($insuranceCoverDetails['vehicleCost'] <= $commercialCompreheiveCost->sum_insured_to_value && $insuranceCoverDetails['vehicleCost'] >= $commercialCompreheiveCost->sum_insured_from_value) || 
                                                    // *    ($commercialCompreheiveCost->sum_insured_to_value == 0 && $insuranceCoverDetails['vehicleCost'] >= $commercialCompreheiveCost->sum_insured_from_value)) &&
                                                    //  *   ($insuranceCoverDetails['vehicleCost'] >= $commercialClass->min_sum_insured)
                                                    //   *  ) {
                                                        if ((($request['insuranceCoverDetails']->vehicleCost <= $commercialCompreheiveCost->sum_insured_to_value && $request['insuranceCoverDetails']->vehicleCost >= $commercialCompreheiveCost->sum_insured_from_value) || 
                                                        ($commercialCompreheiveCost->sum_insured_to_value == 0 && $insuranceCoverDetails['vehicleCost'] >= $commercialCompreheiveCost->sum_insured_from_value)) &&
                                                        ($request['insuranceCoverDetails']->vehicleCost >= $commercialClass->min_sum_insured)
                                                        ) {

                                                            $returnable =$returnable = 'found';

                                                            $coverDetails = array();
                                                            $coverDetails['uuid'] = Uuid::generate(4)->string;
                                                            $coverDetails['company'] = $insuranceCover->InsuranceProviderBelongToCompany;
                                                            $coverDetails['cover'] = $insuranceCover->InsuranceProviderBelongsToCover;
                                                            $coverDetails['subCategory'] = $insuranceCover->InsuranceCoverBelongsToSubCategory->name;
                                                            $coverDetails['insuranceCover'] = $insuranceCover->name;
                                                            $coverDetails['amountPayable'] = ($insuranceCoverDetails['vehicleCost']*$commercialCompreheiveCost->rate)/100 ;
                                                            array_push($response,$coverDetails); 

                                                        break;
                                                }

                                                     
    
                                                }
    
                                            }                                                                               
                                    }

                                }
                                if ($returnable == null) {
                                    # code...
                                    array_push($response,"No appropriate Premiums were found."); 
                                }

                            } else {
                                # code...
                                // ! THIS SECTION OFTHE CODE I SUSED TO IMPLEMENT THIRD PARTY COMMERCIAL MOTOR INSURANCE.


                            }
                            
                        }
                        

                    }

                break;
            
                default:
                # code...
                            
        }

        return response($response);        


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
     * @param  int  $idr
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
