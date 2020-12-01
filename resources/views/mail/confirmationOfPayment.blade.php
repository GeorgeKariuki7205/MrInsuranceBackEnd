@component('mail::message')
# Hello, {{$personalDetailsArray['name']}},

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
| Cost: | are neat      |    $1 |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent