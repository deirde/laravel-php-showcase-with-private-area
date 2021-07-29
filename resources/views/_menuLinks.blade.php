<ul class="menu-links">
    @if (App()['config']['app']['feature_blog_enabled'])
        <li class="{{ HelperNavIsActive(__('urls.blog')) }}"
            icon="md {{ __('labels.category.blog.icon') }}">
            <a href="{{ HelperNavUrl(__('urls.blog')) }}"
                title="{{ __('labels.nav.link.blog') }}">
                <i class="md {{ __('labels.category.blog.icon') }}"></i>
                <span>
                    {{ __('labels.nav.top.blog') }}
                </span>
            </a>
        </li>
    @endif
    @if (App()['config']['app']['feature_works_enabled'])
        <li class="{{ HelperNavIsActive(__('urls.works')) }}"
            icon="md {{ __('labels.category.works.icon') }}">
            <a href="{{ HelperNavUrl(__('urls.works')) }}"
                title="{{ __('labels.nav.link.works') }}">
                <i class="md {{ __('labels.category.works.icon') }}"></i>
                <span>
                    {{ __('labels.nav.top.works') }}
                </span>
            </a>
        </li>
    @endif
    <li class="{{ HelperNavIsActive(__('urls.contact')) }}"
        icon="md {{ __('labels.category.contact.icon') }}">
        <a href="{{ HelperNavUrl(__('urls.contact')) }}"
            title="{{ __('labels.nav.link.contact') }}">
            <i class="md {{ __('labels.category.contact.icon') }}"></i>
            <span>
                {{ __('labels.nav.top.contact') }}
            </span>
        </a>
    </li>
    <li class="{{ HelperNavIsActive(__('urls.login')) }}"
        icon="md {{ __('labels.category.login.icon') }}">
        <a href="{{ HelperNavUrl(__('urls.login')) }}"
            title="{{ __('labels.nav.link.login') }}">
            <i class="md {{ __('labels.category.login.icon') }}"></i>
            <span>
                {{ __('labels.nav.top.login') }}
            </span>
        </a>
    </li>
    <li class="{{ HelperNavIsActive(__('urls.signUp')) }}"
        icon="md {{ __('labels.category.signUp.icon') }}">
        <a href="{{ HelperNavUrl(__('urls.signUp')) }}"
            title="{{ __('labels.nav.link.signUp') }}">
            <i class="md {{ __('labels.category.signUp.icon') }}"></i>
            <span>
                {{ __('labels.nav.top.signUp') }}
            </span>
        </a>
    </li>
    <li menu-toggle="" name="menu-links-langs-list" icon="md md-input" class="ng-isolate-scope">
        <a href="#" data-toggle="collapse" data-target="#menu-links-langs-list" aria-expanded="false"
           aria-controls="menu-links-langs-list" class="collapsible-header waves-effect ng-binding collapsed"
           ng-class="{active: isOpen()}">
            <i class="md md-input"></i>
            <span>
                {{ __('labels.lang.changeLanguage') }}
            </span>
            <div class="ripple-wrapper"></div>
        </a>
        <ul id="menu-links-langs-list" class="collapse" ng-class="{in: isOpen()}">
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