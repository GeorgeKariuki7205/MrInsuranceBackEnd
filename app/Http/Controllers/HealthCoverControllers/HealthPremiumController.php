<?php

namespace App\Http\Controllers\HealthCoverControllers;

use App\HealthCoverModels\HealthPremium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Http\Resources\HealthModels\PremiumResource;
use  App\Http\Resources\HealthModels\PremiumResourceCollection;
class HealthPremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PremiumResourceCollection::collection(HealthPremium::all());
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
            'covered_amount_id'=> 'required|exists:health_cover_amounts,id',
            'min_age'=>'required|integer',
            'max_age'=>'required|integer',
            'principal_member'=>'required|integer',
            'spouse'=>'required|integer',
            'child'=>'required|integer',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $premium = new HealthPremium();
        $premium->fill($request->all())->save();        
        return response('Added Premium Successfully.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\HealthPremium  $healthPremium
     * @return \Illuminate\Http\Response
     */
    public function show(HealthPremium $healthPremium)
    {
        //
        return new PremiumResource($healthPremium);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\HealthPremium  $healthPremium
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthPremium $healthPremium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\HealthPremium  $healthPremium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthPremium $healthPremium)
    {
        //
        $healthPremium->update($request->all());
        return response('Successfully Updated Premium.',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\HealthPremium  $healthPremium
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthPremium $healthPremium)
    {
        //
        $healthPremium->delete();
        return response("Successfully Deleted Premium",200);
    }
}
