@extends('layoutEmail')
@section('content')
    {!! __('labels.email.regstrationSuccessful.0') !!}
    {{ __('labels.email.regstrationSuccessful.1') }}
    <br/>
    <br/>
    <a href="/{{ $locale }}/{{ __('urls.confirmEmail') }}/{{ $key }}"
        title="{{ __('labels.email.regstrationSuccessful.2') }}">
        {{ __('labels.email.regstrationSuccessful.2') }}
    </a>
@endsection