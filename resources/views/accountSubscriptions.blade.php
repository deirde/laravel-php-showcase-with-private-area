@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.accountBilling.icon') }}"></i>
                {{ __('labels.category.accountBilling.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.accountBilling.subtitle') !!}
            </p>
        </div>
        @if (Session::has('flash'))
            <div class="row">
                <div class="col-md-10">
                    <div class="col-md-12" style="padding:0">
                        @include('_flash', ['flash' => Session::get('flash')])
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @include('_accountLinks', ['active' => 'notifications'])
        </div>
    </section>
@endsection