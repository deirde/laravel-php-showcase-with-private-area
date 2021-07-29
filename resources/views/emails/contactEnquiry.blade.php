@extends('layoutEmail')
@section('content')
    {{ __('labels.email.contactEnquiry.0') }}
    <br/>
    {{ __('labels.email.contactEnquiry.1') }}
    <br/>
    <br/>
    <br/>
    {{ __('labels.form.label.whatFor') }}:
    <br/>
    {{ $whatFor }}
    <br/>
    <br/>
    {{ __('labels.form.label.name') }}:
    <br/>
    {{ $name }}
    <br/>
    <br/>
    {{ __('labels.form.label.email') }}:
    <br/>
    {{ $email }}
    <br/>
    <br/>
     {{ __('labels.form.label.provideDetail') }}:
    <br/>
    {{ $details }}
@endsection