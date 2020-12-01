@component('mail::message')
# Hello, {{$personalDetailsArray}},

We highly appreciiate you purchasing an inurance cover through our platform. 

---
Your Premium Details Are As Shown Below,. 
***
 

|         |            |
| :-------------: |:-------------:
| Insurance Cover| {{$insuranceCoverDetails['name']}}  |
| Company:      | {{$insuranceCoverDetails['company']}}      |
| Cover:      | {{$insuranceCoverDetails['cover'] }}      |
| Sub Category:      | {{$insuranceCoverDetails['SubCategory']}}      |
| Cost: | are neat      |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
