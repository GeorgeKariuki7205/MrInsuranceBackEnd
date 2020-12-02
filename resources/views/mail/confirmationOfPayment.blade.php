@component('mail::message')
Hello, {{$names}}

We highly Appreciate you buying Inurance From Mr Insurance, . 
This email spells out the next steps to complete your transaction.

***
Your Premium Details Are As Shown Below: 

***

<table>
    <tr>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>Insurance Cover</td>
        <td>{{$insuranceCoverDetailsName}}</td>
    </tr>
    <tr>
        <td>Company:</td>
        <td>{{$insuranceCoverDetailsCompany->name}}</td>
    </tr>
    <tr>
        <td>Cover:</td>
        <td>{{$insuranceCoverDetailsCover->name }}</td>
    </tr>
    <tr>
        <td>Sub Category:</td>
        <td>{{$insuranceCoverDetailsSubCategory->name}}</td>
    </tr>
</table>
| Cost: | are neat      |

@component('mail::button', ['url' => 'https://mrinsurance.georgekprojects.tk/'])
Activate Your Account.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
