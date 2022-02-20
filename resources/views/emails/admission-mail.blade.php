
@component('mail::message')

# Application ID {{ $details['id'] }}
 
{{ $details['name'] }} your application successfully done!
 

@component('mail::button', ['url' => $details['url']])
Download Application Form
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}


@endcomponent