@component('mail::message')
# Hello {{ $user->name }}
You changed your email.

Use the link below to verify it:
@component('mail::button', ['url' => route('verify', $user->verification_token)])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent