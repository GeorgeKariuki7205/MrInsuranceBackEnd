@component('mail::message')
Hello, {{$names}}

We highly Appreciate you buying Inurance From Mr Insurance, . 
This email spells out the next steps to complete your transaction.

***
Your Premium Details Are As Shown Belo: 

***
{{$numberOfInsuranceCoverModel}}
{{$intentionId}}

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Activate Your Account.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
