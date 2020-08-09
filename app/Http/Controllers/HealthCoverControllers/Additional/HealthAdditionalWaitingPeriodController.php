<?php

namespace App\Http\Controllers\HealthCoverControllers\Additional;

use App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HealthModels\Additional\AdditionalWaitingPeriodResource;
use App\Http\Resources\HealthModels\Additional\AdditionalWaitingPeriodResourceCollection;

class HealthAdditionalWaitingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdditionalWaitingPeriodResourceCollection::collection(HealthAdditionalWaitingPeriod::all());
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
                    'situation'=>'required',
                    'period_amount'=> 'required|integer',
                    'period_time'=>'required',
                    'additional_id'=> 'required|exists:health_additionals,id',
                ]);
        
                if ($validator->fails()) {
                    
                    // ! return the errors that have been gotten from posting the data.
        
                    return response($validator->errors(),250);
        
                }

                $additionalWaitingPeriod = new HealthAdditionalWaitingPeriod();
                $additionalWaitingPeriod->fill($request->all())->save();
                return response("Successfully Added.",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod  $healthAdditionalWaitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(HealthAdditionalWaitingPeriod $healthAdditionalWaitingPeriod)
    {
        //
        return new AdditionalWaitingPeriodResource($healthAdditionalWaitingPeriod);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod  $healthAdditionalWaitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthAdditionalWaitingPeriod $healthAdditionalWaitingPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod  $healthAdditionalWaitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthAdditionalWaitingPeriod $healthAdditionalWaitingPeriod)
    {
        //! storing a single company.
        $validator = Validator::make($request->all(), [            
            'period_amount'=> 'integer',            
            'additional_id'=> 'exists:health_additionals,id',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }
        //
        $healthAdditionalWaitingPeriod->update($request->all());
        return response("Successfully Updated.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalWaitingPeriod  $healthAdditionalWaitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthAdditionalWaitingPeriod $healthAdditionalWaitingPeriod)
    {
        //
        $healthAdditionalWaitingPeriod->delete();
        return response("Successfully Deleted.",200);
    }
}
