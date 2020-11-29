<?php
namespace App\Http\Controllers\MotorInsuranceControllers;
use App\Http\Controllers\Controller;
use App\MotorInsuranceModels\AdditionalCover;
use Illuminate\Http\Request;
use App\Http\Resources\MotorModels\AdditionalCoversResource;
class AdditionalCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return response(AdditionalCoversResource::collection(AdditionalCover::all()),200);
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
        $motorAdditionalCovers = new AdditionalCover();
        $motorAdditionalCovers->fill($request->all())->save();

        return response("Successfully Added",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorInsuranceModels\AdditionalCover  $additionalCover
     * @return \Illuminate\Http\Response
     */
    public function show( $additionalCover)
    {
        //
        $newRecord = null;
        $allRecords = AdditionalCover::where('id',$additionalCover)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }

        return response(new AdditionalCoversResource($newRecord),200);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorInsuranceModels\AdditionalCover  $additionalCover
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalCover $additionalCover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorInsuranceModels\AdditionalCover  $additionalCover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $additionalCover)
    {
        //
        $newRecord = null;
        $allRecords = AdditionalCover::where('id',$additionalCover)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }
        $newRecord->update($request->all());

        return response("Successfully Updated.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorInsuranceModels\AdditionalCover  $additionalCover
     * @return \Illuminate\Http\Response
     */
    public function destroy($additionalCover)
    {
        //
        $newRecord = null;
        $allRecords = AdditionalCover::where('id',$additionalCover)->get();

        foreach ($allRecords as $allRecord) {
            # code...
            $newRecord = $allRecord;
        }
        $newRecord->delete();

        return response("Successfully Deleted.",200);
    }
}
