@component('mail::message')
# Hello, Name Of User,. 

We highly appreciiate you purchasing an inurance cover through our platform. 

---
Your Premium Details Are As Shown Below,. 
***
 

|         |            |   |
| ------------- |:-------------:| -----:|
| Insurance Cover| right-aligned | $1600 |
| Company:      | centered      |   $12 |
| Cost: | are neat      |    $1 |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
