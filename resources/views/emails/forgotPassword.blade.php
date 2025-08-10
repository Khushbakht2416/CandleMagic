@component('mail::message')
<p>Hello {{ $user->name }}</p>

<p>You have requested to reset your password. Click the button below to reset it:</p>

@component('mail::button', ['url' => url('passwordReset/' . $user->remember_token)])
Reset Password
@endcomponent

<p>If you did not request a password reset, no further action is required.</p>

<p>In case you have issues, please contact our support team.</p>

Thanks,<br />
{{ config('app.name') }}

@endcomponent
