<?php

namespace App\Http\Controllers\MotorInsuranceControllers\CommercialVehicle;

use App\MotorInsuranceModels\CommercialVehicles\CommercialClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MotorModels\CommercialVehicles\CommercialClassesResource;

class CommercialClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(CommercialClassesResource::collection(CommercialClass::all()),200);
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
        $commercialClassVariable = new CommercialClass();
        $commercialClassVariable->fill($request->all())->save();
        return response("Added the new Commercial Class",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialClass  $commercialClass
     * @return \Illuminate\Http\Response
     */
    public function show($commercialClass)
    {
        //
        $class = null;
        $commercialClasses = CommercialClass::where('id',$commercialClass)->get();
        foreach ($commercialClasses as $commercialClass) {
            # code...
            $class = $commercialClass;
        }
        return  response(new CommercialClassesResource($class),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialClass  $commercialClass
     * @return \Illuminate\Http\Response
     */
    public function edit(CommercialClass $commercialClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialClass  $commercialClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $commercialClass)
    {
        //
        $class = null;
        $commercialClasses = CommercialClass::where('id',$commercialClass)->get();
        foreach ($commercialClasses as $commercialClass) {
            # code...
            $class = $commercialClass;
        }
        $class->update($request->all());
        return response("Successfully Updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\CommercialVihicles\CommercialClass  $commercialClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($commercialClass)
    {
        //
        $class = null;
        $commercialClasses = CommercialClass::where('id',$commercialClass)->get();
        foreach ($commercialClasses as $commercialClass) {
            # code...
            $class = $commercialClass;
        }

        $class->delete();
        return response("Successfully Deleted",200);
    }
}
