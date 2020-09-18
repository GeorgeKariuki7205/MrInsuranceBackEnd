<?php

namespace App\Http\Controllers\MotorInsuranceControllers\CommercialVehicle;
use App\Http\Controllers\Controller;
use App\MotorInsuranceModels\CommercialVehicles\CommercialThirdPartyCost;
use Illuminate\Http\Request;
use App\Http\Resources\MotorModels\CommercialVehicles\CommercialThirdPartyCostResource;

class CommercialThirdPartyCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(CommercialThirdPartyCostResource::collection(CommercialThirdPartyCost::all()),200);
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
        $newRecord = new CommercialThirdPartyCost();
        $newRecord->fill($request->all())->save();
        return response("Successfully Added",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialThirdPartyCost  $commercialThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function show($commercialThirdPartyCost)
    {
        //
        $newRecord = null;
        $allRecords = CommercialThirdPartyCost::where('id',$commercialThirdPartyCost)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }

        return response(new CommercialThirdPartyCostResource($newRecord),200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialThirdPartyCost  $commercialThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialThirdPartyCost $commercialThirdPartyCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialThirdPartyCost  $commercialThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commercialThirdPartyCost)
    {
        //
        $newRecord = null;
        $allRecords = CommercialThirdPartyCost::where('id',$commercialThirdPartyCost)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }
        $newRecord->update($request->all());
        return response("Successfully Updated",200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialThirdPartyCost  $commercialThirdPartyCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($commercialThirdPartyCost)
    {
        $newRecord = null;
        $allRecords = CommercialThirdPartyCost::where('id',$commercialThirdPartyCost)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }
        $newRecord->delete();
        return response("Successfully Deleted",200);
    }
}
