@component('mail::message')

Hello admin,

{{$data['name']}} has scheduled a tour from hamro realty website.

**Contact Details:**

Email: {{$data['email']}}

Phone: {{$data['phone']}}

**Tour Details:**

Property: {{$data['property']}}

Tour Date: {{$data['date']}}

Tour Time: {{$data['time']}}

Tour Style: {{$data['style']}}

Note: {{$data['note']==''?'N/A':$data['note']}}

@component('mail::button',['url'=>$data['url']])
View Property Detail
@endcomponent

@endcomponent
