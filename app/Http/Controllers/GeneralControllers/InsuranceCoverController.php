<?php

namespace App\Http\Controllers\GeneralControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralModels\InsuranceCoverResource;
use App\Http\Resources\GeneralModels\InsuranceCoverResourceCollection;
use App\GeneralModels\InsuranceCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InsuranceCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //! getting all the covers. 
        return InsuranceCoverResourceCollection::collection(InsuranceCover::all());
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
        //! storing a single company.
        $validator = Validator::make($request->all(), [
            'company_id'=>'integer|required|exists:companies,id',
            'cover_id'=>'integer|required|exists:covers,id',
            'is_active'=>'required|boolean',
            'year'=>'required'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $insurance_cover = new InsuranceCover();
        $insurance_cover->fill($request->all())->save();

        return response('Successfully Added the New Insurance Cover.',200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralTables\InsuranceProvider  $insuranceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(InsuranceCover $insuranceCover)
    {
        return new InsuranceCoverResource($insuranceCover);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralTables\InsuranceProvider  $insuranceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(InsuranceProvider $insuranceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralTables\InsuranceProvider  $insuranceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InsuranceCover $insuranceCover)
    {
        //
        //! storing a single company.
        $validator = Validator::make($request->all(), [
            'company_id'=>'integer|exists:companies,id',
            'cover_id'=>'integer|exists:covers,id',
            'is_active'=>'boolean',            
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }
        $insuranceCover->update($request->all());

        return response("The Insurance Cover Has Successfully Been Updated.",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralTables\InsuranceProvider  $insuranceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsuranceProvider $insuranceProvider)
    {
        //
        $insuranceProvider->delete();
        return response("The Insurance Cover Has Successfully Been Deleted",200);
    }
}
