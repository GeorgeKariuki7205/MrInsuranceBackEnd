<?php

namespace App\Http\Controllers\HealthCoverControllers;
use App\Http\Controllers\Controller;
use App\HealthCoverModels\HealthWaitingPeriod;
use Illuminate\Http\Request;
use App\Http\Resources\HealthModels\WaitingPeriodsResource;
use App\Http\Resources\HealthModels\WaitingPeriodsResourceCollection;
use Illuminate\Support\Facades\Validator;

class WaitingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return WaitingPeriodsResourceCollection::collection(HealthWaitingPeriod::all());
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
            'insurance_covers_id'=> 'required|exists:insurance_covers,id',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $waitingPeriod = new HealthWaitingPeriod();
        $waitingPeriod->fill($request->all())->save();

        return response("Added The Health Waiting Period",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCover\WaitingPeriod  $waitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(HealthWaitingPeriod $waitingPeriod)
    {
        //
        return new WaitingPeriodsResource($waitingPeriod);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCover\WaitingPeriod  $waitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthWaitingPeriod $waitingPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCover\WaitingPeriod  $waitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthWaitingPeriod $waitingPeriod)
    {
        //
        $waitingPeriod->update($request->all());
        return response("Updated Successfully Waiting Period.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCover\WaitingPeriod  $waitingPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthWaitingPeriod $waitingPeriod)
    {
        //
        $waitingPeriod->delete();
        return response("Successfully Deleted A Health Waiting Period.",200);
    }
}
