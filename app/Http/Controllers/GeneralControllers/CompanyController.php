<?php

namespace App\Http\Controllers\GeneralControllers;
use App\Http\Controllers\Controller;
use App\GeneralModels\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GeneralModels\CompanyResource;
use App\Http\Resources\GeneralModels\CompanyResourceCollection;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //! showing all the companies. 
        return CompanyResourceCollection::collection(Company::all());
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
            'name' => 'required',
            'imageLocation' => 'required',
            'companyPointsPerson' => 'required'
        ]);

        if ($validator->fails()) {
            
            // ! return the errors that have been gotten from posting the data.

            return response($validator->errors(),250);

        }

        $company = new Company();
        $company->fill($request->all())->save();

        return response("Successfully Added Company",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralTables\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        return new CompanyResource($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralTables\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralTables\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return response("Successfully Updated.", 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralTables\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();
        return response(
            "Successfully Deleted.", 204
        );
    }
}
