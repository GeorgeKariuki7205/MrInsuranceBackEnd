@component('mail::message')
# Hello, {{$personalDetailsArray['name']}},

We highly appreciiate you purchasing an inurance cover through our platform. 

---
Your Premium Details Are As Shown Below,. 
*** 
@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
