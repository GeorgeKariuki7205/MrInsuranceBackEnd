<?php

namespace App\Http\Controllers\HealthCoverControllers\Additional;

use App\HealthCoverModels\Additional\HealthAdditionalNotCovered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Http\Resources\HealthModels\Additional\AdditionalNotCovered;
use  App\Http\Resources\HealthModels\Additional\AdditionalNotCoveredResourceCollection;

class HealthAdditionalNotCoveredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdditionalNotCoveredResourceCollection::collection(HealthAdditionalNotCovered::all());
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
        //! storing a single company.
                 $validator = Validator::make($request->all(), [                    
                    'name'=>'required',
                    'additional_id'=> 'required|exists:health_additionals,id',
                ]);
        
                if ($validator->fails()) {
                    
                    // ! return the errors that have been gotten from posting the data.
        
                    return response($validator->errors(),250);
        
                }

                $healthAdditionalNotCovered = new HealthAdditionalNotCovered();
                $healthAdditionalNotCovered->fill($request->all())->save();
                return response("Successfully  Added.",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalNotCovered  $healthAdditionalNotCovered
     * @return \Illuminate\Http\Response
     */
    public function show(HealthAdditionalNotCovered $healthAdditionalNotCovered)
    {
        //
        return new AdditionalNotCovered($healthAdditionalNotCovered);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalNotCovered  $healthAdditionalNotCovered
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthAdditionalNotCovered $healthAdditionalNotCovered)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalNotCovered  $healthAdditionalNotCovered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthAdditionalNotCovered $healthAdditionalNotCovered)
    {
        //
        $healthAdditionalNotCovered->update($request->all());
        return response("Successfully  Updated.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalNotCovered  $healthAdditionalNotCovered
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthAdditionalNotCovered $healthAdditionalNotCovered)
    {
        //
        $healthAdditionalNotCovered->delete();
        return response("Successfully  Deleted.",200);
    }
}
