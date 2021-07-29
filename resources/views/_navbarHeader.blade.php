<nav class="navbar navbar-default navbar-fixed-top navbar-fullwidth">
    <div class="container-fluid">
        <div class="navbar-header pull-left">
            <button type="button"
                class="navbar-toggle pull-left m-15" data-activates=".sidebar">
                <span class="sr-only">
                    {{ __('labels.nav.toggleNavigation') }}
                </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="breadcrumb hidden-sm">
                <li class="logo">
                    <a href="{{ HelperNavUrl(__('urls.home')) }}"
                        title="@php echo Config()->get('app.name') @endphp">
                    </a>
                </li>
                @if (App()['config']['app']['feature_blog_enabled'])
                    <li class="{{ HelperNavIsActive(__('urls.blog')) }}"
                        icon="md md-blur-on">
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
                    <li class="{{ HelperNavIsActive(__('urls.works')) }}"
                        icon="md md-blur-on">
                        <a href="{{ HelperNavUrl(__('urls.works')) }}"
                            title="{{ __('labels.nav.link.works') }}">
                            <span>
                                {{ __('labels.nav.top.works') }}
                            </span>
                        </a>
                    </li>
                @endif
                <li class="{{ HelperNavIsActive(__('urls.contact')) }}"
                    icon="md md-blur-on">
                    <a href="{{ HelperNavUrl(__('urls.contact')) }}"
                        title="{{ __('labels.nav.link.contact') }}">
                        <span>
                            {{ __('labels.nav.top.contact') }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-header pull-right">
            <ul class="breadcrumb">
                @if (HelperAccountIsLogged())
                    <li class="{{ HelperNavIsActive(__('urls.account')) }}"
                        icon="md md-blur-on">
                        <a href="{{ HelperNavUrl(__('urls.account')) }}"
                            title="{{ __('labels.nav.link.account') }}">
                            <span>
                                {{ __('labels.nav.top.account') }}
                            </span>
                            <div class="ripple-wrapper"></div>
                        </a>
                    </li>
                    <li class="{{ HelperNavIsActive(__('urls.logout')) }}"
                        icon="md md-blur-on">
                        <a href="{{ HelperNavUrl(__('urls.logout')) }}"
                            title="{{ __('labels.nav.link.logout') }}">
                            <span>
                                {{ __('labels.nav.top.logout') }}
                            </span>
                            <div class="ripple-wrapper"></div>
                        </a>
                    </li>
                @else
                    <li class="{{ HelperNavIsActive(__('urls.login')) }}"
                        icon="md md-blur-on">
                        <a href="{{ HelperNavUrl(__('urls.login')) }}"
                            title="{{ __('labels.nav.link.login') }}">
                            <span>
                                {{ __('labels.nav.top.login') }}
                            </span>
                            <div class="ripple-wrapper"></div>
                        </a>
                    </li>
                    <li class="{{ HelperNavIsActive(__('urls.signUp')) }}"
                        icon="md md-blur-on">
                        <a href="{{ HelperNavUrl(__('urls.signUp')) }}"
                            title="{{ __('labels.nav.link.signUp') }}">
                            <span>
                                {{ __('labels.nav.top.signUp') }}
                            </span>
                        </a>
                    </li>
                @endif
                <li icon="md md-blur-on">
                    <a href=""
                        data-toggle="dropdown"
                        aria-expanded="false"
                        title="{{ __('labels.nav.link.account') }}">
                        <span>
                            {{ __('labels.lang.language') }}
                        </span>
                        <i class="md md-arrow-drop-down"></i>
                        <div class="ripple-wrapper"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a title="{{ __('labels.lang.changeLanguage') }}">
                                {{ __('labels.lang.changeLanguage') }}
                            </a>
                        </li>
                        <li class="divider"></li>
                        @foreach (HelperNavGetLangs() as $key => $val)
                            <li @if ($val['isActive']) class="active" @endif>
                                <a @if (!$val['isActive']) href="{{ HelperNavGetUrlInLocale($key) }}" @endif
                                    title="{{ $val['label'] }}">
                                    {{ $val['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
