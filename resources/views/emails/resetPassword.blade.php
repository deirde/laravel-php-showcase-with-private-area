@extends('layoutEmail')
@section('content')
    {!! __('labels.email.resetPassword.0') !!}
    {{ __('labels.email.resetPassword.1') }}
    <br/>
    <br/>
    <b>
        {{ html_entity_decode($password) }}
    </b>
    <br/>
    {{ __('labels.email.resetPassword.2') }}
    <br/>
    <br/>
    <a href="/{{ $locale }}/{{ __('urls.login') }}"
        title="{{ __('labels.nav.link.login') }}">
        {{ __('labels.nav.link.login') }}
    </a>
@endsection