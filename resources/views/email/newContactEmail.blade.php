@component('mail::message')

Hello admin,

{{$data['name']}} has contacted you from hamro realty website.

**Contact Details:**

Email: {{$data['email']}}

Phone: {{$data['phone']}}

**Message :**

{{$data['message']}}

@endcomponent
