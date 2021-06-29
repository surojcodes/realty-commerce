@component('mail::message')

Hello {{$data['name']}},

You are receiving this email becaue you booked a tour from Hamro Realty.
Your tour booking has been confirmed.

**Tour Details:**

Property: {{$data['property']}}

Tour Date: {{$data['date']}}

Tour Time: {{$data['time']}}

Tour Style: {{$data['style']}}

Note: {{$data['note']==''?'N/A':$data['note']}}

**Your Details:**

Email: {{$data['email']}}

Phone: {{$data['phone']}}


@component('mail::button',['url'=>$data['url']])
View Property Detail
@endcomponent

@component('mail::button',['url'=>'http://localhost:8000/contact'])
Contact Us
@endcomponent

@endcomponent
