<?php
namespace App\Http\Controllers\MotorInsuranceControllers\PrivateVehicle;
use App\Http\Controllers\Controller;

use App\MotorInsuranceModels\PrivateVehicles\PrivateComprehensiveCover;
use Illuminate\Http\Request;
use App\Http\Resources\MotorModels\PrivateVehicle\PrivateComprehensiveResource;
class PrivateComprehensiveCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(PrivateComprehensiveResource::collection(PrivateComprehensiveCover::all()),200);

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
        $newPrivateComprehensiveCover = new PrivateComprehensiveCover();
        ($newPrivateComprehensiveCover->fill($request->all))->save();

        return response('Succefully Added A Single Private Coprehensive Cover.',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\PrivateVihicles\PrivateComprehensiveCover  $privateComprehensiveCover
     * @return \Illuminate\Http\Response
     */
    public function show(PrivateComprehensiveCover $privateComprehensiveCover)
    {
        //
        return response(new PrivateComprehensiveResource($privateComprehensiveCover),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\PrivateVihicles\PrivateComprehensiveCover  $privateComprehensiveCover
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivateComprehensiveCover $privateComprehensiveCover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\PrivateVihicles\PrivateComprehensiveCover  $privateComprehensiveCover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivateComprehensiveCover $privateComprehensiveCover)
    {
        //
        $privateComprehensiveCover->update($request->all());
        return response('Updated A Single PrivateComprehensiveCover',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\PrivateVihicles\PrivateComprehensiveCover  $privateComprehensiveCover
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivateComprehensiveCover $privateComprehensiveCover)
    {
        //
        $privateComprehensiveCover->delete();
        return response('Deleted Successfully',200);
    }
}
