@component('mail::message')
Hello, {{$purchaserName}}

We highly Appreciate you buying Inurance From Mr Insurance, . 
This email spells out the next steps to complete your transaction.

***
Your Premium Details Are As Shown Below: 

***

{{-- <table>
    <tr>
        <th ></th>
        <th></th>
    </tr>
    <tr>
        <td style="margin-right:10%;">Insurance Cover: </td>
        <td style="color:black;"><b>{{$purchaseObtained->PurchaseBelongsToInsuranceCover->name}}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Company:</td>
        <td style="color:black;"> <b>{{$purchaseObtained->PurchaseBelongsToInsuranceCover->InsuranceProviderBelongToCompany->name}}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Cover:</td>
        <td style="color:black;"> <b>{{$purchaseObtained->PurchaseBelongsToInsuranceCover->InsuranceProviderBelongsToCover->name }}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Sub Category:</td>
        <td style="color:black;"> <b>{{$purchaseObtained->PurchaseBelongsToInsuranceCover->InsuranceCoverBelongsToSubCategory->name}}</b></td>
    </tr>
</table>

***
Your Premium Details Are As Shown Below: 

***

<table>
    <tr>
        <th ></th>
        <th></th>
    </tr>
    <tr>
        <td style="margin-right:10%;">Name : </td>
        <td style="color:black;"><b>{{$purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->first_name.' '.$purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->second_name}}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Phone Number :</td>
        <td style="color:black;"> <b>{{$purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->phone_number}}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Email Address :</td>
        <td style="color:black;"> <b>{{$purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->email }}</b></td>
    </tr>   
</table>

***
Your Purchase Details Are As Shown Below: 

***

<table>
    <tr>
        <th ></th>
        <th></th>
    </tr>
    <tr>
        <td style="margin-right:10%;">Invoice Id : </td>
        <td style="color:black;"><b>{{$purchaseObtained->purchase_invoice_id}}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Amount Paid : </td>
        <td style="color:black;"> <b>{{$purchaseObtained->percentage_of_payment }}</b></td>
    </tr>
    <tr>
        <td style="margin-right:10%;">Percantage Of Payment :</td>
        <td style="color:black;"> <b>{{$purchaseObtained->amount_paid }}</b></td>
    </tr>  
    <tr>
        <td style="margin-right:10%;">Date Of Payment :</td>
        <td style="color:black;"> <b>{{\Carbon\Carbon::createFromTimeStamp(strtotime($purchaseObtained->date_of_purchase))->toDayDateTimeString()() }}</b></td>
    </tr>  
    
</table>

***
Next Steps: 

***

<h5>Thank you for purchasing an insurance premium from us, the following will be the next steps to make sure we successfully 
    get you your insurance.
</h5>

@if ($purchaseObtained->PurchasebelongsToClient->ClientbelongsToUser->account_activated == 1)
    <h5>1. Log In to your Account.</h5>
        <p>Use the link below to logIn.</p>
        @component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
        Log In 
        @endcomponent
@else
    <h5>Activate Your Account.</h5>
    <p>Use the link below to activate your account.</p>
    @component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
    Activate Your Account.
    @endcomponent
@endif

<h5>2. Upload Neccessary Documents: </h5>
<p>Upload Scanned Copies Of: </p>
{{-- @foreach ($collection as $item)
    
@endforeach --}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
