@component('mail::message')
{!! $body !!}


@component('mail::button', ['url' => url('/')])
Visit Our Site
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
