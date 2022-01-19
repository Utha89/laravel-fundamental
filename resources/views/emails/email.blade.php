@component('mail::message')
# Welcome my Website

Percobaan Pengiriman Email dari laravel

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
