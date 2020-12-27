@component('mail::message')
Hello, {{$names}}

We highly Appreciate you buying Inurance From Mr Insurance, . 
This email spells out the next steps to complete your transaction.

***
Your Premium Details Are As Shown Below: 

***

<table>
    <tr>
        <th style="margin-right:10%;"></th>
        <th></th>
    </tr>
    <tr>
        <td>Insurance Cover: </td>
        <td style="color:black;"><b>{{$insuranceCoverDetailsName}}</b></td>
    </tr>
    <tr>
        <td>Company:</td>
        <td style="color:black;"> <b>{{$insuranceCoverDetailsCompany->name}}</b></td>
    </tr>
    <tr>
        <td>Cover:</td>
        <td style="color:black;"> <b>{{$insuranceCoverDetailsCover->name }}</b></td>
    </tr>
    <tr>
        <td>Sub Category:</td>
        <td style="color:black;"> <b>{{$insuranceCoverDetailsSubCategory->name}}</b></td>
    </tr>
</table>



@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Activate Your Account.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
