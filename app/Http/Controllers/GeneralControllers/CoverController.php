<?php

namespace App\Http\Controllers\GeneralControllers;

use App\GeneralModels\Cover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GeneralModels\CoverResource;
use App\Http\Resources\GeneralModels\CoverResourceCollection;
class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //! getting all the covers. 

        return CoverResourceCollection::collection(Cover::all());
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
         //! storing a single cover.
         $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'description' => 'required',
            'has_sub_categories' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $cover = new Cover();
        $cover->fill($request->all())->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralTables\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function show(Cover $cover)
    {
        //! getting a single cover only. 

        return new CoverResource($cover);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralTables\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function edit(Cover $cover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralTables\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cover $cover)
    {
        $validator = Validator::make($request->all(), [            
            'has_sub_categories' => 'boolean',
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $cover->update($request->all());

        return response("Cover Updated",200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralTables\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cover $cover)
    {
        //
        $cover->delete();
        return response("Cover Deleted",204);

    }
}
