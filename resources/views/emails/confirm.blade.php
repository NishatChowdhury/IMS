@component('mail::message')
# Introduction

{{ $details['name'] }} your application successfully Approved!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
