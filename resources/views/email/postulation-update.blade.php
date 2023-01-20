@component('mail::message')
# Update Postulation News

Hi {{ $email->name }}! Your postulation process to {{ $email->position }} has been changed! Here's the details:

{{ $email->observations }}

@endcomponent
