<?php

namespace App\Http\Controllers\Payments;

use App\Payments\LipaNaMpesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Payments\Payment;
use Illuminate\Http\Response;
use App\Events\PaymentProcessingEvent;
use App\Jobs\Notifications\AfterPayment;
use App\Payments\IntentionToPay;
use App\User;
use App\Client;
use App\Visitor\Visitor;
use Webpatser\Uuid\Uuid;
use App\Purchases\Purchase;
use App\Purchases\PaymentsProcessed;
class LipaNaMpesaController extends Controller
{

    public $personalDetails;

    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp = $lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode . $passkey . $timestamp);
        return $lipa_na_mpesa_password;
    }
    /**
     * Lipa na M-PESA STK Push method
     * */
    public function customerMpesaSTKPush(Request $request)
    {

        // return $request->personalDetails['firstName'];
        $cost = $request->cost;
        $phoneNumberEdited = $request->phoneNumberEdited;
        $email_address= $request->personalDetails['email_address'];
        $firstName= $request->personalDetails['firstName'];
        $phoneNumber= $request->personalDetails['phoneNumber'];
        $secondName= $request->personalDetails['secondName'];

        $this->personalDetails = $request;
        // return $this->personalDetails;
                                        
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
            'PartyA' => $phoneNumberEdited, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $phoneNumberEdited, // replace this with your phone number
            // 254115335486 https://mrinsuranceapi.georgekprojects.tk/
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
        $mpesa_transaction = new LipaNaMpesa();
        
            // ! saving the data to the database. 

            if ($mpesa_transaction->ResultCode == 0 ) {
                # code...
                // ! getting all records in the intention to pay. 

                $intentionToPay = IntentionToPay::where('MerchantRequestID',$content->Body->stkCallback->MerchantRequestID)
                                                ->where('CheckoutRequestID',$content->Body->stkCallback->CheckoutRequestID)
                                                ->get();
                $countIntentionToPay = count($intentionToPay);

                if ($countIntentionToPay == 1) {
                    
                    $visitorId = null;
                    $intentionId = null;
                    $insuranceCoverId = null;
                    $amountPayable = null;
                    # code...
                    $mpesa_transaction->MerchantRequestID = $content->Body->stkCallback->MerchantRequestID;
                    $mpesa_transaction->CheckoutRequestID = $content->Body->stkCallback->CheckoutRequestID;
                    $mpesa_transaction->Amount = $content->Body->stkCallback->CallbackMetadata->Item[0]->Value;
                    $mpesa_transaction->MpesaReceiptNumber = $content->Body->stkCallback->CallbackMetadata->Item[1]->Value;
                    $mpesa_transaction->TransactionDate = $content->Body->stkCallback->CallbackMetadata->Item[3]->Value;
                    $mpesa_transaction->PhoneNumber = $content->Body->stkCallback->CallbackMetadata->Item[4]->Value;
        
                    $mpesa_transaction->save();

                    foreach ($intentionToPay as $intention) {
                        # code...
                        $intention->confirmed = true;
                        $intention->save();
                        $visitorId = $intention->visitorId;
                        $intentionId = $intention->InsuranceCoverId;
                        $insuranceCoverId = $intention->InsuranceCoverId;
                        $amountPayable = $intention->amountPayable;
                    }
                    
                    // ! this section of the application is used to complete the pipeline to the payments. 

                    $visitorSuccessfullPayments = Visitor::where('id',$visitorId)->get();

                    $firstNameOfVisitor = null;
                    $secondNameOfVisitor = null;
                    $email_addressOfVisitor= null;
                    $phoneNumberOfVisitor = null;

                    foreach ($visitorSuccessfullPayments as $visitorSuccessfullPayment) {
                        # code...
                        $firstNameOfVisitor = $visitorSuccessfullPayment->fisrtName;
                        $secondNameOfVisitor =$visitorSuccessfullPayment->secondName;
                        $email_addressOfVisitor=$visitorSuccessfullPayment->emailAddress;
                        $phoneNumberOfVisitor =$visitorSuccessfullPayment->phoneNumber;                        
                    }


                    $userRecordeds = User::where('email',$email_addressOfVisitor)->where('phone_number',$phoneNumberOfVisitor)->get();
                    // $userRecordeds = User::where('phone_number',$phoneNumberOfVisitor)->get();
                    $numberfUsersWithDetails = count($userRecordeds);

                    if ($numberfUsersWithDetails == 0) {
                        # code...

                        $user = new User();
                        $user->first_name = $firstNameOfVisitor;
                        $user->second_name = $secondNameOfVisitor;
                        $user->email = $email_addressOfVisitor;
                        $user->phone_number = $phoneNumberOfVisitor;
                        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
                        $user->save();
                        $user->assignRole('client');
                                                
                    }
                    else {
                        
                        foreach ($userRecordeds as $userRecorded) {
                            # code...
                            $user = $userRecorded;
                        }

                    }

                    // ! checking to see if te user is registered in the Clients table. 

                    $clinetDetails = Client::where('user_id',$user->id)->get();

                    $numberOfClinetsDetails = count($clinetDetails);

                    if ($numberOfClinetsDetails == 0) {
                        # code...
                        $clinetRecord = new Client; 
                        $clinetRecord->user_id = $user->id;
                        $clinetRecord->visitorId = $visitorId;
                        $clinetRecord->uuidGenerated = Uuid::generate(4)->string;
                        $clinetRecord->save();
                    } 
                    else {
                        # code...
                        foreach ($clinetDetails as $clinetDetail) {
                            # code...
                            $clinetRecord = $clinetDetail;
                        }
                    }

                    // ! storing data in the purchases table.
                    $uuid = Uuid::generate(4)->string;                     
                    $purchase = new Purchase(); 
                    $purchase->insurance_cover_id  = $insuranceCoverId; 
                    $purchase->purchase_invoice_id  = $uuid;
                    $purchase->client_id = $clinetRecord->id;
                    $purchase->date_of_purchase = Carbon::now();
                    $purchase->percentage_of_payment = ($mpesa_transaction->Amount/$amountPayable)/100;
                    $purchase->amount_paid = $mpesa_transaction->Amount;
                    $purchase->cost = $amountPayable;
                    $purchase->save();


                    // ! storing the reocrd in the payments procesed table; 

                    $paymentsProcesed = new PaymentsProcessed();                    
                    $paymentsProcesed->purchase_id = $purchase->id;
                    $paymentsProcesed->payment_gateway = 'STK_PUSH';
                    $paymentsProcesed->amount_paid = $mpesa_transaction->Amount;
                    $paymentsProcesed->payment_gateway_id = $mpesa_transaction->id;
                    $paymentsProcesed->save();

                    // Storage::put('attempt3.txt',"Test1.");
                        // ! fire the broadcast events. 
                        event(new PaymentProcessingEvent($content));

                        $purchaseMades = Purchase::where('purchase_invoice_id',$uuid)->get();
                        $purchasePassed = null;
                        foreach ($purchaseMades as $purchaseMade) {
                            # code...
                            $purchasePassed = $purchaseMade;
                        }
                        
                        // ! firing the job.
                        $afterPaymentNotification = new AfterPayment($visitorId,$intentionId,$purchasePassed);
                        dispatch($afterPaymentNotification);
                        
                        $response = new Response();
                        $response->headers->set("Content-Type", "text/xml; charset=utf-8");
                        $response->setContent(json_encode(["Lipa Na Mpea Online" => "Success"]));
                
                        return $response;
                }                                       
            
            } else {
                # code...
            }
            

           

    }

    // ! creating the function that will be used to generate the access Tokens .  

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

    // ! creating the confirmation method.

    public function confirmationMethod(Request $request)
    {

        $content = json_decode($request->getContent());
        $contentData = $request->getContent();
        $mpesa_transaction = new Payment();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        // $mpesa_transaction->TransactionType = 'Lipa Na MPESA.';
        $mpesa_transaction->save();

        // Storage::put('attempt3.txt', $contentData);

        // // Storage::put('attempt3.txt', $contentMpesa);
        // // ! fire the broadcast events. 
        // event(new PaymentEvent($content));

        //! Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type", "text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult" => "Success"]));

        return $response;
    }

    public function createValidationResponse($result_code, $result_description)
    {
        $result = json_encode(["ResultCode" => $result_code, "ResultDesc" => $result_description]);
        $response = new Response();
        $response->headers->set("Content-Type", "application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

    // ! creating the validation method. 

    public function validationMethod(Request $request)
    {

        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    // ! registering URLs . 

    public function registerURLS()
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $this->generateAccessTokens())); //setting custom header


        $curl_post_data = array(
            'ShortCode' => '600754',
            'ResponseType' => 'Confirmed',
            'ConfirmationURL' => 'https://mrinsuranceapi.georgekprojects.tk/api/confirmationURL',
            'ValidationURL' => 'https://mrinsuranceapi.georgekprojects.tk/api/validationURL',
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        return $curl_response;
    }

    public function simulateTransaction(Request $request)
    {

        $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $this->generateAccessTokens())); //setting custom header

        $curl_post_data = array(
            'ShortCode' => '600754',
            'CommandID' => 'CustomerPayBillOnline',
            'Amount' => 1000,
            'Msisdn' =>'254708374149',
            'BillRefNumber' => '00000'
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        return $curl_response;
    }
}
