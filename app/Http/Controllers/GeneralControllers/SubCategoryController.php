<?php

namespace App\Http\Controllers\GeneralControllers;

use App\GeneralModels\SubCategoryCover;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GeneralModels\SubCategoryResourceCollection;
use App\Http\Resources\GeneralModels\SubCategoryResource;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return SubCategoryResourceCollection::collection(SubCategoryCover::all());
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',            
            'cover_id' => 'required|exists:covers,id'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $subCategoryCover = new SubCategoryCover();
        $subCategoryCover->fill($request->all())->save();
        return response("Successfully Added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralModels\SubCategoryCover  $subCategoryCover
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategoryCover $subCategoryCover)
    {
        //
        return new SubCategoryResource($subCategoryCover);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralModels\SubCategoryCover  $subCategoryCover
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategoryCover $subCategoryCover)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralModels\SubCategoryCover  $subCategoryCover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategoryCover $subCategoryCover)
    {
        //
        $validator = Validator::make($request->all(), [            
            'cover_id' => 'exists:covers,id'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),206);

        }

        $subCategoryCover->update($request->all());
        return response("Successfully Updated.");        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralModels\SubCategoryCover  $subCategoryCover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $subCategoryCover)
    {
        //
        return $subCategoryCover;
        $subCategoryCover->delete();
        return response("Successfully Deleted.");
    }
}
