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
            <div class="col-md-5">
                @if ($payload && $payload->id && $payload->sources)
                    <div class="col-md-12" style="padding:0">
                        <div class="well white" id="forms-validation-container">
                            <legend>
                                <div class="row">
                                    <div class="col-xs-6">
                                        {{ __('labels.accountBilling.block.0.title') }}
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="display-td">
                                            <img class="img-responsive pull-right"
                                                 src="/assets/images/accepted-credit-cards.png"
                                                 style="position:relative;top:-10px;margin-bottom:-10px">
                                        </div>
                                    </div>
                                </div>
                            </legend>
                            <br/>
                            <p>
                                <i class="md md-credit-card"></i>
                                {{ reset($payload->sources->data)->brand }}
                                <br/>
                                <i class="md md-timer"></i>
                                {{ __('labels.accountBilling.block.0.paragraph.0') }} {{ reset($payload->sources->data)->exp_month }}
                                /{{ reset($payload->sources->data)->exp_year }}
                                <br/>
                                <i class="md md-security"></i>
                                {{ __('labels.accountBilling.block.0.paragraph.1') }} {{ reset($payload->sources->data)->last4 }}
                                <br/>
                                <i class="md md-verified-user"></i>
                                {{ __('labels.accountBilling.block.0.paragraph.2') }} {{ reset($payload->sources->data)->name }}
                                <br/>
                            <form method="post" id="form-validation1" class="form-validation form-floating">
                                {{ csrf_field() }}
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ App()['config']['services']['stripe']['key'] }}"
                                        data-image="/assets/images/logo-stripe.png"
                                        data-name="{{ __('labels.accountBilling.block.0.paragraph.5') }}"
                                        data-panel-label="{{ __('labels.accountBilling.block.0.paragraph.4') }}"
                                        data-label="{{ __('labels.accountBilling.block.0.paragraph.4') }}"
                                        data-allow-remember-me=true
                                        data-locale="auto">
                                </script>
                            </form>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="col-md-12" style="padding:0">
                        <div class="well white" id="forms-validation-container">
                            <legend>
                                <div class="row">
                                    <div class="col-xs-6">
                                        {{ __('labels.accountBilling.block.0.title') }}
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="display-td">
                                            <img class="img-responsive pull-right"
                                                 src="http://i76.imgup.net/accepted_c22e0.png"
                                                 style="position:relative;top:-10px;margin-bottom:-10px">
                                        </div>
                                    </div>
                                </div>
                            </legend>
                            <br/>
                            {{ __('labels.accountBilling.block.0.paragraph.7') }}
                            <br/>
                            <br/>
                            <form method="post" id="form-validation1" class="form-validation form-floating">
                                {{ csrf_field() }}
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ App()['config']['services']['stripe']['key'] }}"
                                        data-image="/assets/images/logo-stripe.png"
                                        data-name="{{ __('labels.accountBilling.block.0.paragraph.5') }}"
                                        data-panel-label="{{ __('labels.accountBilling.block.0.paragraph.8') }}"
                                        data-label="{{ __('labels.accountBilling.block.0.paragraph.6') }}"
                                        data-allow-remember-me=true
                                        data-locale="auto">
                                </script>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection