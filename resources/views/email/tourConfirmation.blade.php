@component('mail::message')

Hello {{$data['name']}},

You are receiving this email becaue you booked a tour from Hamro Realty.
Your tour booking has been confirmed.

**Tour Details:**

Tour Date: {{$data['date']}}

Tour Time: {{$data['time']}}

Tour Style: {{$data['style']}}

Note: {{$data['note']==''?'N/A':$data['note']}}


**Properties:** 
@foreach ($data['properties'] as $property)
1. [{{$property->property}}](http://localhost:8000/property/{{$property->matrix_id}})
@endforeach


**Your Details:**

Email: {{$data['email']}}

Phone: {{$data['phone']}}

@component('mail::button',['url'=>'http://localhost:8000/contact'])
Contact Us
@endcomponent

@endcomponent
