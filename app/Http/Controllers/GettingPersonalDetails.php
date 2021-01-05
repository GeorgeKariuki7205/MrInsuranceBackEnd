<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Payments\LipaNaMpesa;
use App\Purchases\PaymentsProcessed;
class GettingPersonalDetails extends Controller
{
    //
    public function getPersonalDetailsOfUser(Request $request){

        $uuidGenerated = $request->uuid;
        $clients = Client::where('uuidGenerated',$uuidGenerated)->get();

        $personalData = null;
        foreach ($clients as $client) {
            # code...
            $personalData = $client->ClientbelongsToUser->all();
        }

        return response()->json(['personalData' => $personalData], 200);

    }

    // ! this function is called once the user has successfully purchased a premium and wants to continue with the process.  

    public function getDetailsForInsurancePremiumAfterSuccessfullPayment(Request $request){

        $mpesaReceiptNumber = $request->MpesaReceiptNumber;

        // ! etting the details from the STK PUSH table. 
        $lipaNaMpesaPayments = LipaNaMpesa::where('MpesaReceiptNumber',$mpesaReceiptNumber)->get();

        $idOfLipaNaMpesa = null;
        foreach ($lipaNaMpesaPayments as $lipaNaMpesaPayment) {

            $idOfLipaNaMpesa = $lipaNaMpesaPayment->id;

        }

        $paymentRecords = PaymentsProcessed::where('payment_gateway_id',$idOfLipaNaMpesa)->get();
        
        foreach ($paymentRecords as $paymentRecord) {
            # code...
            $purchaseDetailsToSendToUser = array();
            $premiumDetails = array();
            $personalDetails = array();
            $purchaseDetails = array();
            $documentsneeded = array();
            $clientUUID = null;

            $paymentRecordPurchase = $paymentRecord->paymentsProcessedBelongsToPurchase;

            // ! getting premium details. 
            $premiumDetails['insuranceCover'] = $paymentRecordPurchase->PurchaseBelongsToInsuranceCover->name;
            $premiumDetails['company'] = $paymentRecordPurchase->PurchaseBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name;
            $premiumDetails['cover'] = $paymentRecordPurchase->PurchaseBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name;
            $premiumDetails['sub_category'] = $paymentRecordPurchase->PurchaseBelongsToInsuranceCover->InsuranceCoverBelongsToSubCategory->name;

            $purchaseDetailsToSendToUser['premiumDetails'] = $premiumDetails;

            // ! Personal Details. 
            $personalDetails['name'] = $paymentRecordPurchase->PurchasebelongsToClient->ClientbelongsToUser->first_name.' '.$purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->second_name;
            $personalDetails['phone_number'] = $paymentRecordPurchase->PurchasebelongsToClient->ClientbelongsToUser->phone_number;
            $personalDetails['email'] = $paymentRecordPurchase->PurchasebelongsToClient->ClientbelongsToUser->email;

            $purchaseDetailsToSendToUser['personalDetails'] = $personalDetails;

            // ! purchase Details. 
            $purchaseDetails['purchase_invoice_id'] = $paymentRecordPurchase->purchase_invoice_id;
            $purchaseDetails['amount_paid'] = $paymentRecordPurchase->amount_paid;
            $purchaseDetails['percentage_of_payment'] = $paymentRecordPurchase->percentage_of_payment;
            $purchaseDetails['date_of_payment'] = \Carbon\Carbon::createFromTimeStamp(strtotime($purchaseObtained->date_of_purchase))->toDayDateTimeString();

            $purchaseDetailsToSendToUser['purchaseDetails'] = $purchaseDetails;

            if ($paymentRecordPurchase->PurchasebelongsToClient->ClientbelongsToUser->account_activated == 0) {
                # code...
                $clientUUID = $paymentRecordPurchase->PurchasebelongsToClient->uuidGenerated;
            } else {
                # code...
                $clientUUID =  0;
            }
            $purchaseDetailsToSendToUser['clientUUID'] = $clientUUID;

            foreach ($paymentRecordPurchase->PurchaseBelongsToInsuranceCover->InsuranceProviderBelongsToCover->CoverhasManyDocumentsNeeded as $document) {
                # code...
                array_push($documentsneeded, $document->name);
            }            
            
            $purchaseDetailsToSendToUser['documentsneeded'] = $documentsneeded;
        }


        // ! returning everything. 

        return response()->json($purchaseDetailsToSendToUse, 200);
    }


}
