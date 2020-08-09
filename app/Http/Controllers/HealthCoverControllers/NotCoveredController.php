<?php

namespace App\Http\Controllers\HealthCoverControllers;

use App\HealthCoverModels\HealthNotCovered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HealthModels\NotCoveredResource;
use App\Http\Resources\HealthModels\NotCoveredResourceCollection;
use Illuminate\Http\Request;

class NotCoveredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return NotCoveredResourceCollection::collection(HealthNotCovered::all());
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
            'name' => 'required',
            'insurance_covers_id' => 'required|exists:insurance_covers,id',            
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $notCovered = new HealthNotCovered();
        $notCovered->fill($request->all())->save();
        return response("Added Not Covered",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthCover\NotCovered  $notCovered
     * @return \Illuminate\Http\Response
     */
    public function show(HealthNotCovered $notCovered)
    {
        //
        return new NotCoveredResource($notCovered);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthCover\NotCovered  $notCovered
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthNotCovered $notCovered)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthCover\NotCovered  $notCovered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthNotCovered $notCovered)
    {
        //
         //! storing a single company.
         $validator = Validator::make($request->all(), [            
            'insurance_covers_id' => 'exists:insurance_covers,id',            
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }
        $notCovered->update($request->all());
        return response("Successfully Updated Not Covered",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthCover\NotCovered  $notCovered
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthNotCovered $notCovered)
    {
        //
        $notCovered->delete();
        return response("Successfully Deleted Not Covered",200);
    }
}
