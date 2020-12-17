@component('mail::message')
# Your Credentials for accessing to {{ config('app.name') }}

Use this credentials to login into the website.

@component('mail::table')
| Name or UserName      | Password  |
| :------------- |:-------------|
| {{$user->email}} / {{$user->username}} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
