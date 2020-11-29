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

class AfterPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public $content;
    public $personalDetails;

    public function __construct($content,$personalDetails)
    {
        //
        $this->content = $content;
        $this->personalDetails = $personalDetails;
        
        
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $phoneNumberEdited = $this->personalDetails['phoneNumberEdited'];
        $phoneNumberEdited = $this->personalDetails['phoneNumberEdited'];
        //? SENDING THE SMS.
        Storage::put('attempt3.txt',$this->content);
        // return $this->personalDetails;
        // die();
        

        //! Set your app credentials
        //! return "Send Message Method";
        $username   = "SampleAppForMe";
        $apiKey     = "79ef469520d71bf5334224f6f7c23e4441e635f2728067289dcb2172e908be3d";

        //! Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        //! Get the SMS service
        $sms        = $AT->sms();

        //! Set the numbers you want to send to in international format
        $recipients = "+".$phoneNumberEdited;

        //! Set your message
        $message    = "This is the message From Mr Insurance.";

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


        // $email = new PaymentMail();
        // Mail::to('ngugigeorge697@gmail.com')->from('ngugigeorge697@gmail.com','Virat Gandhi')->send($email);

        $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail.welcome'], $data, function($message) {
         $message->to('ngugigeorge697@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('notification@georgekprojects.tk','Notification GeorgeKProjects');
      });

    }
}
