<?php

namespace App\Http\Controllers\HealthCoverControllers;
use App\Http\Controllers\Controller;
use App\HealthCoverModels\HealthCoverAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HealthModels\CoverAmountsResource;
use App\Http\Resources\HealthModels\CoverAmountsResourceCollection;
class CoverAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return CoverAmountsResourceCollection::collection(HealthCoverAmount::all());
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
            'amount' => 'required|integer',
            'insurance_cover_id' => 'required|integer|exists:insurance_covers,id',            
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $coverAmount = new HealthCoverAmount();
        $coverAmount->fill($request->all())->save();
        return response("The Cover Amount was saved successfully.",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCover\CoverAmount  $coverAmount
     * @return \Illuminate\Http\Response
     */
    public function show(HealthCoverAmount $coverAmount)
    {
        //
        return new CoverAmountsResource($coverAmount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCover\CoverAmount  $coverAmount
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverAmount $coverAmount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCover\CoverAmount  $coverAmount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthCoverAmount $coverAmount)
    {
        //
        $validator = Validator::make($request->all(), [
            'amount' => 'integer',
            'insurance_cover_id' => 'integer|exists:insurance_covers,id',            
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $coverAmount->update($request->all());

        return response("Updated Successfully",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCover\CoverAmount  $coverAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthCoverAmount $coverAmount)
    {
        //
        $coverAmount->delete();

        return response("The cover amount has been deleted successfully");
    }
}
