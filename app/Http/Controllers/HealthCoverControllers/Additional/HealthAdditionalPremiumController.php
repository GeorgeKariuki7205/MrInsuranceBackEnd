<?php

namespace App\Http\Controllers\HealthCoverControllers\Additional;

use App\HealthCoverModels\Additional\HealthAdditionalPremium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HealthModels\Additional\AdditionalPremiumResource;
use App\Http\Resources\HealthModels\Additional\AdditionalPremiumResourceCollection;
use Illuminate\Support\Facades\Validator;

class HealthAdditionalPremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdditionalPremiumResourceCollection::collection(HealthAdditionalPremium::all());
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
                'limit'=> 'required|integer',
                'cost'=> 'required|integer',
                'additional_id'=> 'required|exists:health_additionals,id',
            ]);
    
            if ($validator->fails()) {
                
                // ! return the errors that have been gotten from posting the data.
    
                return response($validator->errors(),250);
    
            }

            $healthAdditionalPremium = new HealthAdditionalPremium();
            $healthAdditionalPremium->fill($request->all())->save();

            return response("Successfully Added",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalPremium  $healthAdditionalPremium
     * @return \Illuminate\Http\Response
     */
    public function show(HealthAdditionalPremium $healthAdditionalPremium)
    {
        //
        return new AdditionalPremiumResource($healthAdditionalPremium);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalPremium  $healthAdditionalPremium
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthAdditionalPremium $healthAdditionalPremium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalPremium  $healthAdditionalPremium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthAdditionalPremium $healthAdditionalPremium)
    {
        $healthAdditionalPremium->update($request->all());
        return response("Successfully Updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditionalPremium  $healthAdditionalPremium
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthAdditionalPremium $healthAdditionalPremium)
    {
        $healthAdditionalPremium->delete();
        return response("Successfully Deleted",200);
    }
}
