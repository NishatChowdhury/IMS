
@component('mail::message')

# Application ID {{ $details['id'] }}
 
{{ $details['name'] }} {{ __('your application successfully done')}}!
 

@component('mail::button', ['url' => $details['url']])
{{ __('Download Application Form')}}
@endcomponent

{{ __('Thanks')}},<br>
{{ config('app.name') }}


@endcomponent