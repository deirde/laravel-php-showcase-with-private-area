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
                                {{ __('labels.accountBilling.block.0.paragraph.0') }} {{ reset($payload->sources->data)->exp_month }}/{{ reset($payload->sources->data)->exp_year }}
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
                    <div class="col-md-12" style="padding:0">
                        <div class="well white" id="forms-validation-container">
                            <legend>
                                <div class="row">
                                    <div class="col-xs-12">
                                        SEPA Direct Bank
                                    </div>
                                </div>
                            </legend>
                            <br/>
                            <p>
                    

<script src="https://js.stripe.com/v3/"></script>
<form action="/charge" method="post" id="payment-form">
  <div class="form-row inline">
    <div class="col">
      <label for="name">
        Name
      </label>
      <input id="name" name="name" placeholder="Jenny Rosen" required>
    </div>
    <div class="col">
      <label for="email">
        Email Address
      </label>
      <input id="email" name="email" type="email" placeholder="jenny.rosen@example.com" required>
    </div>
  </div>

  <div class="form-row">
    <label for="iban-element">
      IBAN
    </label>
    <div id="iban-element">
    </div>
  </div>
  <div id="bank-name"></div>

  <button>Submit Payment</button>
  <div id="error-message" role="alert"></div>
  <div id="mandate-acceptance">
    By providing your IBAN and confirming this payment, you are
    authorizing Rocketship Inc. and Stripe, our payment service
    provider, to send instructions to your bank to debit your account and
    your bank to debit your account in accordance with those instructions.
    You are entitled to a refund from your bank under the terms and
    conditions of your agreement with your bank. A refund must be claimed
    within 8 weeks starting from the date on which your account was debited.
  </div>
</form>
<style>
input,
.StripeElement {
  height: 40px;
  padding: 10px 12px;
  color: #32325d;
  background-color: white;
  border: 1px solid transparent;
  border-radius: 4px;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
input:focus,
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
<script>
var stripe = Stripe('{{ App()['config']['services']['stripe']['key'] }}');
var elements = stripe.elements();
var style = {
  base: {
    color: '#32325d',
    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    },
    ':-webkit-autofill': {
      color: '#32325d',
    },
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a',
    ':-webkit-autofill': {
      color: '#fa755a',
    },
  }
};
var iban = elements.create('iban', {
  style: style,
  supportedCountries: ['SEPA'],
});
iban.mount('#iban-element');
var errorMessage = document.getElementById('error-message');
var bankName = document.getElementById('bank-name');
iban.on('change', function(event) {
  if (event.error) {
    errorMessage.textContent = event.error.message;
    errorMessage.classList.add('visible');
  } else {
    errorMessage.classList.remove('visible');
  }
  if (event.bankName) {
    bankName.textContent = event.bankName;
    bankName.classList.add('visible');
  } else {
    bankName.classList.remove('visible');
  }
});
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  showLoading();
  var sourceData = {
    type: 'sepa_debit',
    currency: 'eur',
    owner: {
      name: document.querySelector('input[name="name"]').value,
      email: document.querySelector('input[name="email"]').value,
    },
    mandate: {
      notification_method: 'email',
    }
  };
  stripe.createSource(iban, sourceData).then(function(result) {
    if (result.error) {
      errorMessage.textContent = result.error.message;
      errorMessage.classList.add('visible');
      stopLoading();
    } else {
      errorMessage.classList.remove('visible');
      stripeSourceHandler(result.source);
    }
  });
});
</script>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding:0">
                        <div class="well">
                            <legend>
                                {{ __('labels.accountBilling.block.0.paragraph.7') }}
                            </legend>
                            <br/>
                            {{ __('labels.accountBilling.block.0.paragraph.8') }}
                        </div>
                    </div>
                    <div class="col-md-12" style="padding:0">
                        <div class="well">
                            <legend>
                                {{ __('labels.accountBilling.block.0.paragraph.9') }}
                            </legend>
                            <br/>
                            {{ __('labels.accountBilling.block.0.paragraph.10') }}
                        </div>
                    </div>
                @else
                    <div class="col-md-12" style="padding:0">
                        <div class="well white" id="forms-validation-container">
                            <legend>
                                <div class="row">
                                    <div class="col-xs-6">
                                        {{ __('labels.accountProfile.block.1.title') }}
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
                            {{ __('labels.accountProfile.block.1.paragraph') }}
                            <br/>
                            <br/>
                            <form method="post" id="form-validation1" class="form-validation form-floating">
                                {{ csrf_field() }}
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ App()['config']['services']['stripe']['key'] }}"
                                    data-image="/assets/images/logo-stripe.png"
                                    data-name="{{ __('labels.accountBilling.block.0.paragraph.5') }}"
                                    data-panel-label="{{ __('labels.accountBilling.block.0.paragraph.6') }}"
                                    data-label="{{ __('labels.accountBilling.block.0.paragraph.6') }}"
                                    data-allow-remember-me=true
                                    data-locale="auto">
                                </script>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="col-md-12" style="padding:0">
                    <div class="well white">
                        <legend>
                            Pending payments
                        </legend>
                        <br/>
                        <p>
                            <a href="#">Hosting - EUR 80,00</a>
                            <span style="float:right;margin-top:-2px">
                                <button class="btn btn-success btn-flat btn-xs">Details</button>
                                
                                <!--
                                api: create pending payment
                                userid: 3 (may be null?)
                                subject: hosting for domain tmp.com
                                price: 80
                                currency: eur
                                subscription_cycle: one-time
                                subscription_name: client-name
                                send-email: true
                                send-sms: true (prevede api specifica)
                                + sistema di notifiche x scadenza e sospensione
                                -->
                                
                                <button class="btn btn-success btn-flat btn-xs">Pay</button>
                            </span>
                        </p>
                        <p>
                            <a href="#">Developement - GDP 250,00</a>
                            <span style="float:right;margin-top:-2px">
                                <button class="btn btn-success btn-flat btn-xs">Details</button>
                                <button class="btn btn-success btn-flat btn-xs">Pay</button>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection