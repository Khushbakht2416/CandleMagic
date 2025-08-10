@component('mail::message')
<p>Hello {{ $user->name }}</p>

<p>Thank you for registering with us! Please click the button below to verify your email address:</p>

@component('mail::button', ['url' => $verificationUrl])
Verify Email
@endcomponent

<p>If you did not register for an account, no further action is required.</p>

<p>If you encounter any issues, please contact our support team.</p>

Thanks,<br />
{{ config('app.name') }}

@endcomponent
