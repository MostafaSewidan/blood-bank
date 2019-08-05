@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'blood_bank.com'])
    Blood bank
@endcomponent
your pin code is:   <span style="color: blue">{{$code}}</span>
  Thanks,<br>
{{ config('app.name') }}
@endcomponent
