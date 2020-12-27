<?php

namespace App\Jobs\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Storage;

use Mail;
use App\Mail\Notification\PaymentMail;
use App\Mail\MrInsuranceConfirmationOfPaymentEmail;

use App\GeneralModels\InsuranceCover;

use App\Visitor\Visitor;
use App\Purchases\Purchase;
class AfterPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public $visitorId;
    public $intentionId;
    public $purchase;
    

    public function __construct($visitorId,$intentionId,$purchase)
    {
        //
        $this->visitorId = $visitorId;        
        $this->intentionId = $intentionId;
        $this->purchase = $purchase;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $names = null;
        $phoneNumber= null;
        $email_address= null;
        // ! visitor Details. 
        $visitors = Visitor::where('id',$this->visitorId)->get();
        $visitorObtained = null;
        foreach ($visitors as $visitor) {

            $names = $visitor->fisrtName .' '. $visitor->secondName;
            $phoneNumber= $visitor->phoneNumber;
            $email_address= $visitor->emailAddress;  
            
            $visitorObtained = $visitor;
            # code...
        }

        // ! creating the new details for the individual and also the InsuranceCover That He Has Purchased To Be sent Via Email.

        $personalDetailsArray = array();
        $personalDetailsArray['name'] = $names;
        $personalDetailsArray['phoneNumber'] = $phoneNumber;


        $insuranceCoverDetails =array();

        $insuranceCoverModel = InsuranceCover::where('id',$this->intentionId)->get();
        $intentionId = $this->intentionId;

        $numberOfInsuranceCoverModel = count($insuranceCoverModel);
        $insuranceCoverDetailsName = 1;
		$insuranceCoverDetailsCompany = 1;
        $insuranceCoverDetailsCover =   1;
        $insuranceCoverDetailsSubCategory = 1;

        if ($numberOfInsuranceCoverModel == 1) {
            # code...
            foreach ($insuranceCoverModel as $insuranceCover) {
                # code...
                $insuranceCoverDetailsName = $insuranceCover->name;
                $insuranceCoverDetailsCompany= $insuranceCover->InsuranceProviderBelongToCompany;
                $insuranceCoverDetailsCover = $insuranceCover->InsuranceProviderBelongsToCover;
                $insuranceCoverDetailsSubCategory = $insuranceCover->InsuranceCoverBelongsToSubCategory;
                
                
            }
        }

        $editedPhoneNumber = '+254'.substr($phoneNumber,1,9);
        //? SENDING THE SMS.               
        //! Set your app credentials
        //! return "Send Message Method";
        $username   = "SampleAppForMe";
        $apiKey     = "79ef469520d71bf5334224f6f7c23e4441e635f2728067289dcb2172e908be3d";

        //! Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        //! Get the SMS service
        $sms        = $AT->sms();

        //! Set the numbers you want to send to in international format
        // $recipients = "+". $this->personalDetails->phoneNumberEdited;
        $recipients = $editedPhoneNumber;

        //! Set your message
        $message    = "Hello ".$names." We Highly Appreciate You Buying Insurance From Us, Kindly check your email For Futher Details.";

        //! Set your shortCode or senderId
        //! $from       = "MrInsurance";            

        try {
            //!code...
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                //! 'from'    => $from
            ]);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }

        // ? SENDING THE EMAIL.        
        		                
        $purchaseObtained=$this->purchase;
        $email = new MrInsuranceConfirmationOfPaymentEmail($this->purchase->id);
        Mail::to($email_address)->send($email);
    }
}
