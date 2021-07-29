<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{{ __('labels.email.title') }}</title>
    </head>
    <meta name="viewport" content="width=device-width">
    <style>
        @media only screen and (max-device-width: 640px) {
            body {
                overflow: none;
            }
        }
    </style>
    <body style="margin: 0">
        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td></td>
                <td align="right">
                    <p style="font-size: 11px; background-color: #eee; padding: 4px;">
                        <a href="/{{ $locale }}/{{ __('urls.home') }}"
                            title="{{ __('labels.nav.link.home') }}">
                            {{ __('labels.nav.link.home') }}
                        </a> | <a href="/{{ $locale }}/{{ __('urls.contact') }}"
                            title="{{ __('labels.nav.link.contact') }}">
                            {{ __('labels.nav.link.contact') }}
                        </a>
                    </p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="/{{ $locale }}/{{ __('urls.home') }}"
                        title="@php echo Config()->get('app.name'); @endphp">
                        <img src="@php echo Config()->get('app.url'); @endphpassets/images/logo.png"
                            width="150" border="0" style="display:block" />
                    </a>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p style="color: #000">
                        @yield('content')
                    </p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p>
                        <small>
                            <i style="color: #666">
                                {{ __('labels.email.footer.0') }}
                                <br/>
                                {{ __('labels.email.footer.1') }}
                                <br/>
                                <br/>
                                {{ __('labels.email.footer.2') }}
                            </i>
                        </small>
                    </p>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p style="font-size: 11px; background-color: #eee; padding: 4px;"></p>
                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>