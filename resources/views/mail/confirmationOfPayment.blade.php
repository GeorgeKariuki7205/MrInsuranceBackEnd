@component('mail::message')
# Hello, {{$personalDetailsArray['name']}},



@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Link To Btn.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
