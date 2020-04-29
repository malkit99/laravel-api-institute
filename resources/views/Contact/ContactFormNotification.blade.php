@component('mail::message')


Thank you for getting in touch!

We appreciate you contacting Macroword Computer Academy. One of our colleagues will get back in touch with you soon!

Have a great day!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
