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
    public $names;
    public $phoneNumber;
    public $insuranceCoverDetailsName;
    public $insuranceCoverDetailsCompany;
    public $insuranceCoverDetailsCover;
    public $insuranceCoverDetailsSubCategory;
    public $numberOfInsuranceCoverModel;
    public function __construct($names,$phoneNumber,$insuranceCoverDetailsName,$insuranceCoverDetailsCompany,$insuranceCoverDetailsCover,$insuranceCoverDetailsSubCategory,$numberOfInsuranceCoverModel)
    {
        //
        $this->names=$names;
        $this->phoneNumber=$phoneNumber;
        $this->insuranceCoverDetailsName=$insuranceCoverDetailsName;
        $this->insuranceCoverDetailsCompany=$insuranceCoverDetailsCompany;
        $this->insuranceCoverDetailsCover=$insuranceCoverDetailsCover;
        $this->insuranceCoverDetailsSubCategory=$insuranceCoverDetailsSubCategory;
        $this->numberOfInsuranceCoverModel=$numberOfInsuranceCoverModel;
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
