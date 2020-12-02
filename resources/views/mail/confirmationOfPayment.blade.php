@component('mail::message')
# Hello,{{$names}},

We highly appreciiate you purchasing an inurance cover through our platform. 

---
Your Premium Details Are As Shown Below,. 
*** 

|         |            |
| :-------------: |:-------------:|
| Insurance Cover| {{$insuranceCoverDetailsName}}  |
| Company:      | {{$insuranceCoverDetailsCompany}}      |
| Cover:      | {{$insuranceCoverDetailsCover }}      |
| Sub Category:      | {{$insuranceCoverDetailsSubCategory}}      |
| Cost: | are neat      |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
