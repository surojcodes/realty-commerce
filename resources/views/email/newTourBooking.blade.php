@component('mail::message')

Hello admin,

{{$data['name']}} has scheduled a tour from hamro realty website.

**Contact Details:**

Email: {{$data['email']}}

Phone: {{$data['phone']}}

**Tour Details:**
Tour Date: {{$data['date']}}

Tour Time: {{$data['time']}}

Tour Style: {{$data['style']}}

Note: {{$data['note']==''?'N/A':$data['note']}}

**Properties:** 
@foreach ($data['properties'] as $property)
1. [{{$property->property}}](http://localhost:8000/property/{{$property->matrix_id}})
@endforeach


@endcomponent
