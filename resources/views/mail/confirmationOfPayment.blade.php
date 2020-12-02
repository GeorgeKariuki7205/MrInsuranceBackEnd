@component('mail::message')
Hello, {{$names}}

We highly Appreciate you buying Inurance From Mr Insurance, . 
This email spells out the next steps to complete your transaction.

***
Your Premium Details Are As Shown Below: 

***
{{-- {{$insuranceCoverDetailsName}}
{{$numberOfInsuranceCoverModel}}
{{$intentionId}} --}}

|         |            |
| :-------------: |:-------------:|
| Insurance Cover| {{$insuranceCoverDetailsName}}  |
| Company:      | {{$insuranceCoverDetailsCompany}}      |
| Cover:      | {{$insuranceCoverDetailsCover }}      |
| Sub Category:      | {{$insuranceCoverDetailsSubCategory}}      |
| Cost: | are neat      |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Activate Your Account.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
