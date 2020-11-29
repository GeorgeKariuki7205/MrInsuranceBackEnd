<?php

namespace App\Http\Controllers\Payments;

use App\Payments\CustomerToOrganisation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class CustomerToOrganisationController extends Controller
{
 
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp = $lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode . $passkey . $timestamp);
        return $lipa_na_mpesa_password;
    }

    public function generateAccessTokens()
    {

        $consumer_key = "i6X9jcGwwkk6LYiBnUGBYlV1YDU0Gujc";
        $consumer_secret = "Z2ylt0kTE5QqA20j";
        $credentials = base64_encode($consumer_key . ":" . $consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token = json_decode($curl_response);
        return $access_token->access_token;
    }


    public function customerMpesaSTKPush()
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' .$this->generateAccessTokens()));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => 174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => 254796446324, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => 254796446324, // replace this with your phone number
            'CallBackURL' => 'https://mrinsuranceapi.georgekprojects.tk/api/stkPushCallBack',
            'AccountReference' => "Sample",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return $curl_response;

    }

    public function callBackForTheSTKPush(Request $request){
        $content = json_decode($request->getContent());
        $mpesa_transaction = new CustomerToOrganisation();
        
            // ! saving the data to the database. 

            $mpesa_transaction->MerchantRequestID = $content->Body->stkCallback->MerchantRequestID;
            $mpesa_transaction->CheckoutRequestID = $content->Body->stkCallback->CheckoutRequestID;
            $mpesa_transaction->Amount = $content->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $mpesa_transaction->MpesaReceiptNumber = $content->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $mpesa_transaction->TransactionDate = $content->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $mpesa_transaction->PhoneNumber = $content->Body->stkCallback->CallbackMetadata->Item[4]->Value;

            $mpesa_transaction->save();
       
        
        // ! fire the broadcast events. 
        // event(new PaymentEvent($content));

        $response = new Response();
        $response->headers->set("Content-Type", "text/xml; charset=utf-8");
        $response->setContent(json_encode(["Lipa Na Mpea Online" => "Success"]));

        return $response;

    }

}
