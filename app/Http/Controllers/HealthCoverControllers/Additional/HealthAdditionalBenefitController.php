<?php

namespace App\Http\Controllers\HealthCoverControllers\Additional;

use App\HealthCoverModels\Additional\HealthAdditionalBenefit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HealthModels\Additional\AdditionalBenefitResourceCollection;
use App\Http\Resources\HealthModels\Additional\AdditionalBenefitResource;
use Illuminate\Support\Facades\Validator;

class HealthAdditionalBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdditionalBenefitResourceCollection::collection(HealthAdditionalBenefit::all());

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

                 //! storing a single company.
                 $validator = Validator::make($request->all(), [                    
                    'name'=>'required',
                    'additional_id'=> 'required|exists:health_additionals,id',
                ]);
        
                if ($validator->fails()) {
                    
                    // ! return the errors that have been gotten from posting the data.
        
                    return response($validator->errors(),250);
        
                }

                $healthAdditionalBenefit = new HealthAdditionalBenefit();
                $healthAdditionalBenefit->fill($request->all())->save();
                return response("Successfully Added.",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalBenefit  $healthAdditionalBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(HealthAdditionalBenefit $healthAdditionalBenefit)
    {
        //
        return new AdditionalBenefitResource($healthAdditionalBenefit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalBenefit  $healthAdditionalBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthAdditionalBenefit $healthAdditionalBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalBenefit  $healthAdditionalBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthAdditionalBenefit $healthAdditionalBenefit)
    {
        //
        $validator = Validator::make($request->all(), [                                
            'additional_id'=> 'exists:health_additionals,id',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }
        $healthAdditionalBenefit->update($request->all());
        return response("Successfully Updated",200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalBenefit  $healthAdditionalBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthAdditionalBenefit $healthAdditionalBenefit)
    {
        //
        $healthAdditionalBenefit->delete();
        return response("Successfully Deleted",200);

    }
}
