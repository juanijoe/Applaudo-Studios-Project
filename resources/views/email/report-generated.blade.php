@component('mail::message')
# Report Postulation Stage

The follow process postulation has been changed! Here's the details:

    - Candidate: {{ $report->candidate->name }}
    - Position: {{ $report->position->description }}
    - Observations: {{ $report->observations }}

@endcomponent
