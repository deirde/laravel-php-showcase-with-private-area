<section class="footer">
    <ul class="breadcrumb" style="border-top:1px solid #eee">
        <li>
            <span style="color:#999">
                {{ __('labels.footer.copyright') }}
            </span>
        </li>
        @if (App()['config']['app']['feature_blog_enabled'])
            <li class="{{ HelperNavIsActive(__('urls.blog')) }}">
                <a href="{{ __('urls.blog') }}"
                    title="{{ __('labels.nav.link.blog') }}"
                    target="_blank">
                    <span>
                        {{ __('labels.nav.top.blog') }}
                    </span>
                </a>
            </li>
        @endif
        @if (App()['config']['app']['feature_works_enabled'])
            <li class="{{ HelperNavIsActive(__('urls.works')) }}">
                <a href="{{ HelperNavUrl(__('urls.works')) }}"
                    title="{{ __('labels.nav.link.works') }}">
                    <span>
                        {{ __('labels.nav.top.works') }}
                    </span>
                </a>
            </li>
        @endif
        <li class="{{ HelperNavIsActive(__('urls.contact')) }}">
            <a href="{{ HelperNavUrl(__('urls.contact')) }}"
                title="{{ __('labels.nav.link.contact') }}">
                <span>
                    {{ __('labels.nav.top.contact') }}
                </span>
            </a>
        </li>
        @if (HelperAccountIsLogged())
            <li class="{{ HelperNavIsActive(__('urls.account')) }}">
                <a href="{{ HelperNavUrl(__('urls.account')) }}"
                    title="{{ __('labels.nav.link.account') }}">
                    <span>
                        {{ __('labels.nav.top.account') }}
                    </span>
                    <div class="ripple-wrapper"></div>
                </a>
            </li>
            <li class="{{ HelperNavIsActive(__('urls.logout')) }}">
                <a href="{{ HelperNavUrl(__('urls.logout')) }}"
                    title="{{ __('labels.nav.link.logout') }}">
                    <span>
                        {{ __('labels.nav.top.logout') }}
                    </span>
                    <div class="ripple-wrapper"></div>
                </a>
            </li>
        @else
            <li class="{{ HelperNavIsActive(__('urls.login')) }}">
                <a href="{{ HelperNavUrl(__('urls.login')) }}"
                    title="{{ __('labels.nav.link.login') }}">
                    <span>
                        {{ __('labels.nav.top.login') }}
                    </span>
                </a>
            </li>
            <li class="{{ HelperNavIsActive(__('urls.signUp')) }}">
                <a href="{{ HelperNavUrl(__('urls.signUp')) }}" title="{{ __('labels.nav.link.signUp') }}">
                    <span>
                        {{ __('labels.nav.top.signUp') }}
                    </span>
                </a>
            </li>
        @endif
    </ul>
</section>