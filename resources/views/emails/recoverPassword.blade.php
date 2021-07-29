@extends('layoutEmail')
@section('content')
    {!! __('labels.email.recoverPassword.0') !!}
    {{ __('labels.email.recoverPassword.1') }}
    <br/>
    <br/>
    <a href="/{{ $locale }}/{{ __('urls.resetPassword') }}/{{ $key }}"
        title="{{ __('labels.email.recoverPassword.2') }}">
        {{ __('labels.email.recoverPassword.2') }}
    </a>
@endsection