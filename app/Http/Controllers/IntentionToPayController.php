<?php

namespace App\Http\Controllers;

use App\Mpesa\IntentionToPay;
use Illuminate\Http\Request;

class IntentionToPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //! this action is used to expres the intention to pay. 

        $intentionToPay = new IntentionToPay();
        $intentionToPay->uuid = $request->uuid;
        $intentionToPay->MerchantRequestID = $request->MerchantRequestID;
        $intentionToPay->CheckoutRequestID = $request->CheckoutRequestID;
        $intentionToPay->amountPayable =$request->amountPayable;
        $intentionToPay->visitorId =$request->visitorId;
        $intentionToPay->InsuranceCoverId = $request->insuranceCoverID;

        $intentionToPay->save(); 

        return response("Successfully Added Intention To Pay.",200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mpesa\IntentionToPay  $intentionToPay
     * @return \Illuminate\Http\Response
     */
    public function show(IntentionToPay $intentionToPay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mpesa\IntentionToPay  $intentionToPay
     * @return \Illuminate\Http\Response
     */
    public function edit(IntentionToPay $intentionToPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mpesa\IntentionToPay  $intentionToPay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntentionToPay $intentionToPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mpesa\IntentionToPay  $intentionToPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntentionToPay $intentionToPay)
    {
        //
    }
}
