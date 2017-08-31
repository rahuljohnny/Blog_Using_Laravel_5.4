@component('mail::message')
# Introduction

Thanks {{$user->name}} for registering.............................================
-One
-Two
-Three

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => 'http://127.0.0.1:8000/'])
    Sujone sujhosh gai,kujosh dhakia...
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
