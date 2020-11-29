<?php

namespace App\Http\Controllers\MotorInsuranceControllers\CommercialVehicle;
use App\MotorInsuranceModels\CommercialVehicles\CommercialComprehensiveCost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Resources\MotorModels\CommercialVehicles\CommercialComprehensiveCostResource;

class CommercialComprehensiveCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(CommercialComprehensiveCostResource::collection(CommercialComprehensiveCost::all()));

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
        $commercialCost = new CommercialComprehensiveCost();
        ($commercialCost->fill($request->all()))->save();
        return response("Added CommercialComprehensiveCost Successfully",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialComprehensiveCost  $commercialComprehensiveCost
     * @return \Illuminate\Http\Response
     */
    public function show($commercialComprehensiveCost)
    {
        //
        $commercialComprehensiveCostEntry = null;
        $commercialComprehensiveCosts = CommercialComprehensiveCost::where('id',$commercialComprehensiveCost)->get();
        foreach ($commercialComprehensiveCosts as $commercialComprehensiveCost) {
            # code...
            $commercialComprehensiveCostEntry = $commercialComprehensiveCost;
        }

        return response(new CommercialComprehensiveCostResource($commercialComprehensiveCostEntry),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialComprehensiveCost  $commercialComprehensiveCost
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialComprehensiveCost $commercialComprehensiveCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialComprehensiveCost  $commercialComprehensiveCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commercialComprehensiveCost)
    {
        //
        $commercialComprehensiveCostEntry = null;
        $commercialComprehensiveCosts = CommercialComprehensiveCost::where('id',$commercialComprehensiveCost)->get();
        foreach ($commercialComprehensiveCosts as $commercialComprehensiveCost) {
            # code...
            $commercialComprehensiveCostEntry = $commercialComprehensiveCost;
        }

        // return count($commercialComprehensiveCosts);
        $commercialComprehensiveCostEntry->update($request->all());
        return response("Updated Successfully",200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialComprehensiveCost  $commercialComprehensiveCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($commercialComprehensiveCost)
    {
        $commercialComprehensiveCostEntry = null;
        $commercialComprehensiveCosts = CommercialComprehensiveCost::where('id',$commercialComprehensiveCost)->get();
        foreach ($commercialComprehensiveCosts as $commercialComprehensiveCost) {
            # code...
            $commercialComprehensiveCostEntry = $commercialComprehensiveCost;
        }

        $commercialComprehensiveCostEntry->delete();
        return response("Successfully Deleted.",200);
    }
}
