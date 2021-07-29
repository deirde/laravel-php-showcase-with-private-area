<div class="col-md-3">
    <div class="col-md-12" style="padding:0">
        <div class="well white">
            <legend>
                {{ __('labels.accountProfile.block.0.title') }}
            </legend>
            <br/>
            {{ __('labels.accountProfile.block.0.paragraph.0') }}
            <br/>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountProfile')) }}"
                title="{{ __('labels.nav.account.profile') }}"
                class=@if ($active == "profile") "active" @endif>
                {{ __('labels.nav.account.profile') }}
            </a>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountNotifications')) }}"
                title="{{ __('labels.nav.account.notifications') }}"
                class=@if ($active == "notifications") "active" @endif>
                {{ __('labels.nav.account.notifications') }}
            </a>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountBilling')) }}"
                title="{{ __('labels.nav.account.billing') }}"
                class=@if ($active == "billing") "active" @endif>
                {{ __('labels.nav.account.billing') }}
            </a>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountSubscriptions')) }}"
                title="{{ __('labels.nav.account.subscriptions') }}"
                class=@if ($active == "subscriptions") "active" @endif>
                {{ __('labels.nav.account.subscriptions') }}
            </a>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountPayments')) }}"
                title="{{ __('labels.nav.account.payments') }}"
                class=@if ($active == "payments") "active" @endif>
                {{ __('labels.nav.account.payments') }}
            </a>
            <br/>
            <a href="{{ HelperNavUrl(__('urls.accountPassword')) }}"
                title="{{ __('labels.nav.account.password') }}"
                class=@if ($active == "billing") "password" @endif>
                {{ __('labels.nav.account.password') }}
            </a>
        </div>
    </div>
</div>