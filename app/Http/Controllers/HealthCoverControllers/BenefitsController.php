<?php


namespace App\Http\Controllers\HealthCoverControllers;
use App\Http\Controllers\Controller;
use App\HealthCoverModels\HealthBenefit;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HealthModels\BenefitsResource;
use App\Http\Resources\HealthModels\BenefitsResourceCollection;

class BenefitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BenefitsResourceCollection::collection(HealthBenefit::all());
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
            'covered_amount_id' => 'required|exists:health_cover_amounts,id',
            'name' => 'required',
            'type_of_benefit' => 'required|boolean',
            'amount'=> 'integer'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $healthCoverBenefits = new HealthBenefit();
        $healthCoverBenefits->fill($request->all())->save();

        return response("Health Benefits Added Successfully",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCover\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function show(HealthBenefit $benefits)
    {

        return new BenefitsResource($benefits);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCover\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthBenefits $benefits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCover\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthBenefit $benefits)
    {
                
        $benefits->update($request->all());
        return response("Successfully Updated Health Benefits",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCover\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthBenefit $benefits)
    {
        //
        $benefits->delete();
        return response("Successfully Deleted Health Benefits",200);
    }
}
