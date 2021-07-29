@extends('layoutEmail')
@section('content')
    {{ __('labels.email.userSubscribe.0') }}
    <br/>
    {{ __('labels.email.userSubscribe.1') }} <b>{{ $email }}</b>
@endsection