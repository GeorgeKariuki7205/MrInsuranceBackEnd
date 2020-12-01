<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MrInsuranceConfirmationOfPaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $personalDetailsArray;
    public $insuranceCoverDetails;
    public function __construct($personalDetailsArray,$insuranceCoverDetails)
    {
        //
        $this->personalDetailsArray->$personalDetailsArray;
        $this->personalDetailsArray->$insuranceCoverDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmationOfPayment');
    }
}
