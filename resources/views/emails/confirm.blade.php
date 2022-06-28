@component('mail::message')
# Introduction

{{ $details['name'] }} {{ __('your application successfully Approved')}}!

{{ __('Thanks')}},<br>
{{ config('app.name') }}
@endcomponent
