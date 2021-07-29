<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if (!empty($meta['description']))
            <meta name="description" content="{{ $meta['description'] }}">
        @endif
        @if (isset($meta['noindex']) && $meta['noindex'])
            <meta name="robots" content="noindex">
        @endif
        <meta name="author" content="{{ __('labels.meta.author') }}">
        <meta name="theme-color" content="#ffffff">
        <title>{{ $meta['title'] }}</title>
        <link rel="shortcut icon" href="/assets/images/favicon.gif">
        <link href="/assets/vendors.css" rel="stylesheet" />
        <link href="/assets/styles.css" rel="stylesheet" />
        @if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/assets/_envs/' . HelperServerName() . '/style.css'))
            <link href="/assets/_envs/{{ HelperServerName() }}/style.css" rel="stylesheet" />
        @endif
        <style>
            .glyphicon-spin-jcs {
                -webkit-animation: spin 1000ms infinite linear;
                animation: spin 1000ms infinite linear;
            }
            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
        </style>
    </head>
    <body scroll-spy="" id="top" class=" theme-template-dark theme-pink alert-open alert-with-mat-grow-top-right">
        <main class="fullwidth">
            <aside class="sidebar fixed hidden-lg hidden-md">
                <div class="brand-logo">
                    <img src="/assets/images/logo-alt.png"
                        alt="@php echo Config()->get('app.name') @endphp" height="32" />
                </div>
                @php //@include('_userLoggedIn') @endphp
                @include('_menuLinks')
            </aside>
            <div class="main-container">
                @include('_navbarHeader')
                <div class="main-content" autoscroll="true" bs-affix-target=""
                    init-ripples="" style="">
                    @yield('content')
                    @include('_footer')
                </div>
            </div>
        </main>
        @if (!empty(env('APP_GA_TRACKING_CODE')))
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-7090279-14"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', "@php echo env('APP_GA_TRACKING_CODE') @endphp");
            </script>
        @endif
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        @php //<script charset="utf-8" src="//maps.google.com/maps/api/js?sensor=true"></script> @endphp
        <script charset="utf-8" src="/assets/vendors.js"></script>
        <script charset="utf-8" src="/assets/app.js"></script>
    </body>
</html>
