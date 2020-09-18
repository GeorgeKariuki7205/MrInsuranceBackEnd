<?php

namespace App\Http\Controllers\MotorInsuranceControllers\CommercialVehicle;
use App\Http\Controllers\Controller;

use App\MotorInsuranceModels\CommercialVehicles\CommercialTypeOfThirdPartyCost;
use Illuminate\Http\Request;
use App\Http\Resources\MotorModels\CommercialVehicles\CommercialThirdPartyTypeOfCostResource;

class CommercialTypeOfThirdPartyCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(CommercialThirdPartyTypeOfCostResource::collection(CommercialTypeOfThirdPartyCost::all()),200);
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
        $commercialTypeOfThirdPartyCost = new CommercialTypeOfThirdPartyCost();
        $commercialTypeOfThirdPartyCost->fill($request->all())->save();

        return response("Adding Successful.",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialTypeOfThirdPartyCost  $commercialTypeOfThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function show($commercialTypeOfThirdPartyCost)
    {
        //
        $newRecord = null;

        $allRecords = CommercialTypeOfThirdPartyCost::where('id',$commercialTypeOfThirdPartyCost)->get();
        foreach ($allRecords as $allRecord) {
            $newRecord = $allRecord;
            # code...
        }

        return response(new CommercialThirdPartyTypeOfCostResource($newRecord),200);
        // CommercialTypeOfThirdPartyCost
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialTypeOfThirdPartyCost  $commercialTypeOfThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialTypeOfThirdPartyCost $commercialTypeOfThirdPartyCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialTypeOfThirdPartyCost  $commercialTypeOfThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commercialTypeOfThirdPartyCost)
    {
        //
        $newRecord = null;

        $allRecords = CommercialTypeOfThirdPartyCost::where('id',$commercialTypeOfThirdPartyCost)->get();
        foreach ($allRecords as $allRecord) {
            $newRecord = $allRecord;
            # code...
        }
        $newRecord->update($request->all());

        return response("Successfully Updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialTypeOfThirdPartyCost  $commercialTypeOfThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function destroy( $commercialTypeOfThirdPartyCost)
    {
        //
        $newRecord = null;

        $allRecords = CommercialTypeOfThirdPartyCost::where('id',$commercialTypeOfThirdPartyCost)->get();
        foreach ($allRecords as $allRecord) {
            $newRecord = $allRecord;
            # code...
        }
        $newRecord->delete();

        return response("Successfully Deleted",200);
    }
}
