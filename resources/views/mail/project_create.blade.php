@component('mail::message')
# New Project: {{ $project->title }}

{{ $project->description }}

@component('mail::button', ['url' => url('/project/' . $project->id)])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
