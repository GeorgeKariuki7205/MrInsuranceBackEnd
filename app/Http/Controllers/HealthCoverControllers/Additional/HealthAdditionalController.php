<?php

namespace App\Http\Controllers\HealthCoverControllers\Additional;

use App\HealthCoverModels\Additional\HealthAdditional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\HealthModels\Additional\AdditionalResource;
use App\Http\Resources\HealthModels\Additional\AdditionalResourceCollection;
use Illuminate\Support\Facades\Validator;
class HealthAdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AdditionalResourceCollection::collection(HealthAdditional::all());
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
                    'type_of_calculation'=> 'required|boolean',                    
                    'insurance_covers_id'=> 'integer|required|exists:insurance_covers,id',
                ]);
        
                if ($validator->fails()) {
                    
                    // ! return the errors that have been gotten from posting the data.
        
                    return response($validator->errors(),250);
        
                }

              $healthAdditional = new HealthAdditional();  
              $healthAdditional->fill($request->all())->save();
              return response("Successfully Added a New Additional To Health.",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditional  $healthAdditional
     * @return \Illuminate\Http\Response
     */
    public function show(HealthAdditional $healthAdditional)
    {
        //
        return new AdditionalResource($healthAdditional);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditional  $healthAdditional
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthAdditional $healthAdditional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCoverModels\Additional\HealthAdditional  $healthAdditional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthAdditional $healthAdditional)
    {
        //
        $healthAdditional->update($request->all());
        return response("Successfully Updated.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCoverModels\Additional\HealthAdditional  $healthAdditional
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthAdditional $healthAdditional)
    {
        //
        $healthAdditional->delete();
        return response("Succesfully Deleted",200);
    }
}
