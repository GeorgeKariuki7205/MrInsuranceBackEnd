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
    // public $names;
    // public $phoneNumber;
    // public $insuranceCoverDetailsName;
    // public $insuranceCoverDetailsCompany;
    // public $insuranceCoverDetailsCover;
    // public $insuranceCoverDetailsSubCategory;
    // public $numberOfInsuranceCoverModel;
    // public $intentionId;
    public $purhase;
    public function __construct($names,$intentionId,$phoneNumber,$insuranceCoverDetailsName,$insuranceCoverDetailsCompany,$insuranceCoverDetailsCover,$insuranceCoverDetailsSubCategory,$numberOfInsuranceCoverModel)
    {
        //
        // $this->names=$names;
        // $this->phoneNumber=$phoneNumber;
        // $this->insuranceCoverDetailsName=$insuranceCoverDetailsName;
        // $this->insuranceCoverDetailsCompany=$insuranceCoverDetailsCompany;
        // $this->insuranceCoverDetailsCover=$insuranceCoverDetailsCover;
        // $this->insuranceCoverDetailsSubCategory=$insuranceCoverDetailsSubCategory;
        // $this->numberOfInsuranceCoverModel=$numberOfInsuranceCoverModel;
        // $this->intentionId = $intentionId;
        $this->purhase = $purhase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.confirmationOfPayment')->with([
            // 'names'=>$this->names,
            // 'phoneNumber'=>$this->phoneNumber,
            // 'insuranceCoverDetailsName'=>$this->insuranceCoverDetailsName,
            // 'insuranceCoverDetailsCompany'=>$this->insuranceCoverDetailsCompany,
            // 'insuranceCoverDetailsCover'=>$this->insuranceCoverDetailsCover,
            // 'insuranceCoverDetailsSubCategory'=>$this->insuranceCoverDetailsSubCategory,
            // 'numberOfInsuranceCoverModel'=>$this->numberOfInsuranceCoverModel,
            // 'intentionId'=> $this->intentionId,
            'purhase'=> $this->purhase,
            
        ]);
    }
}
