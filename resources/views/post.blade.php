@extends('layoutDefault')
@section('content')
    <section class="cards">
        <div class="page-header">
            <h1>
                <i class="md md-photo"></i>
                {{ __('labels.category.about.title') }}
            </h1>
            <p class="lead">
                {{ __('labels.category.about.subtitle') }}
            </p>
        </div>
        <h3>
            Example: Stacked-to-horizontal
        </h3>
        <p>
            Using a single set of <code>.col-md-*</code> grid classes, you can create a basic grid system that starts out stacked on mobile devices and tablet devices (the extra small to small range) before becoming horizontal on desktop (medium) devices. Place grid columns in any <code>.row</code>.
        </p>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-image"> <img src="http://www.theme-guys.com/materialism/html/assets/img/photos/1.jpg" class="img-responsive" style="max-height:193px;">
                    <div class="card-title">Super card</div>
                    <div class="ripple-wrapper"></div></div>
                    <div class="card-content">
                    <div class="card-profile pull-right"><img src="http://www.theme-guys.com/materialism/html/assets/img/icons/ballicons/bill.svg" alt="" style="width:75px;"></div>
                    <p>I am a very simple card. I am good at containing small info.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-image"> <img src="http://www.theme-guys.com/materialism/html/assets/img/photos/2.jpg" class="img-responsive" style="max-height:193px;">
                    <div class="card-title">Super card</div>
                    <div class="ripple-wrapper"></div></div>
                    <div class="card-content">
                    <div class="card-profile pull-right"><img src="http://www.theme-guys.com/materialism/html/assets/img/icons/ballicons/bill.svg" alt="" style="width:75px;"></div>
                    <p>I am a very simple card. I am good at containing small info.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-image"> <img src="http://www.theme-guys.com/materialism/html/assets/img/photos/3.jpg" class="img-responsive" style="max-height:193px;">
                    <div class="card-title">Super card</div>
                    <div class="ripple-wrapper"></div></div>
                    <div class="card-content">
                    <div class="card-profile pull-right"><img src="http://www.theme-guys.com/materialism/html/assets/img/icons/ballicons/bill.svg" alt="" style="width:75px;"></div>
                    <p>I am a very simple card. I am good at containing small info.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-image"> <img src="http://www.theme-guys.com/materialism/html/assets/img/photos/4.jpg" class="img-responsive" style="max-height:193px;">
                    <div class="card-title">Super card</div>
                    <div class="ripple-wrapper"></div></div>
                    <div class="card-content">
                    <div class="card-profile pull-right"><img src="http://www.theme-guys.com/materialism/html/assets/img/icons/ballicons/bill.svg" alt="" style="width:75px;"></div>
                    <p>I am a very simple card. I am good at containing small info.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="display:none">
                <div class="card">
                    <div class="card-image">
                        <img src="http://www.theme-guys.com/materialism/html/assets/img/photos/2.jpg"> <span class="card-title">Card Title</span>
                        <div class="ripple-wrapper"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="well white">
                    <strong>
                        Performance and reliability
                    </strong>
                    <p>
                        Host your WordPress site on our award winning shared hosting or Premium packages for that extra power. Our 99.99% SLA means your site will always be available.
                    </p>
                    <strong>
                        Load balanced servers
                    </strong>
                    <p>
                        You’ll have separate servers to handle hosting and database management, ensuring your website has the speed and power it deserves.
                    </p>
                    <strong>
                        Expert Support
                    </strong>
                    <p>
                        Specialised in upgrades and plug-ins, our expert support staff is here to help if you need extra guidance.
                    </p>
                    <strong>
                        Backup and Restore
                    </strong>
                    <p>
                        Keep regular backups of your WordPress sites to keep your data safe and restore when needed.
                    </p>
                    <strong>
                        Auto-updates
                    </strong>
                    <p>
                        We’ll ensure that your website is running on the latest version of WordPress. Not only does this give you access to all the latest features, but also helps to keep your website secure and spam free.
                    </p>
                    <strong>
                        Auto-updates
                    </strong>
                    <p>
                        We’ll ensure that your website is running on the latest version of WordPress. Not only does this give you access to all the latest features, but also helps to keep your website secure and spam free.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well white">
                    <legend>
                        What do you need?
                    </legend>
                    <br>
                    <p>
                        It is the best option for anyone looking for a hassle free way of creating a new site with this hugely popular CMS, providing a powerful foundation for even the most resource heavy site. If you are just starting out, our hosting for WordPress is the easiest way to host your website using your own unique web address and has everything you needed to get started including a free domain and email.
                    </p>
                </div>
                <div class="well white">
                    <legend>
                        Example text
                    </legend>
                    <br>
                    <p>
                        If you have a large or busy WordPress site that is starting to get a little sluggish.
                        <br/>
                        If you have a large or busy WordPress site that is starting to get a little sluggish.
                        <br/>
                        If you have a large or busy WordPress site that is starting to get a little sluggish.
                        <br/>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well" id="forms-validation-container">
                    <div>
                        <form method="post" id="form-validation2" class="form-floating"
                            novalidate="true" _lpchecked="1">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>
                                    {{ __('labels.form.label.quote') }}
                                </legend>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.name') }}
                                    </label>
                                    <input type="text" name="name" class="form-control" required=""
                                        value="@php echo (isset($_POST['name']) ? $_POST['name'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.required') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.email') }}
                                    </label>
                                    <input type="email" name="email" class="form-control" required=""
                                        value="@php echo (isset($_POST['email']) ? $_POST['email'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.emailInvalid') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.provideDetail') }}
                                    </label>
                                    <textarea name="details" class="form-control" required=""
                                        data-error="{{ __('labels.form.error.required') }}">@php echo (isset($_POST['details']) ? $_POST['details'] : '') @endphp</textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.url') }}
                                    </label>
                                    <input type="url" name="url" class="form-control"
                                        value="@php echo (isset($_POST['url']) ? $_POST['url'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.url') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label normal">
                                        {{ __('labels.form.label.deadline') }}
                                    </label>
                                    <input type="date" name="deadline" class="form-control" required=""
                                        value="@php echo (isset($_POST['deadline']) ? $_POST['deadline'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.date') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="form-id" value="enquiry">
                                    <button type="submit" class="btn btn-primary disabled">
                                        {{ __('labels.form.label.submit') }}
                                    </button>
                                    <button type="reset" class="btn btn-default">
                                        {{ __('labels.form.label.reset') }}
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display:none">
            <div class="col-md-4">
                <div class="well white">
                    <legend>
                        Provided for all plans
                    </legend>
                    <br>
                    PHP memory limit 128Mb, unlimited subdomains and server alias, unlimited email accounts, unlimited MySQL databases, unlimited FTP accounts, backup suite, webmail, Apache or Nginx webserver, free HTTPS, antivirus and antispam, Wordpress security suite and apps manager.
                    <br>
                    <br>
                    <button class="btn btn-success btn-flat">
                        Yes, i'm interested<div class="ripple-wrapper"></div>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card no-margin">
                    <div class="table-responsive white">
                        <h3 class="table-title p-20">Prices table</h3>
                        <table class="table table-full table-full-small">
                            <colgroup>
                                <col class="auto-cell-size p-r-20">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th></th>
                                    <th>Bandwidth</th>
                                    <th>Disc space</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="(key, item) in data" class="ng-scope">
                                    <td ng-bind-html="item.icon" class="f20 ng-binding">
                                        <i class="md md-crop-16-9 orange darken-1 icon-color"></i>
                                    </td>
                                    <td class="ng-binding"></td>
                                    <td class="ng-binding">10GB</td>
                                    <td class="ng-binding">20GB</td>
                                    <td class="ng-binding">5.90£</td>
                                </tr>
                                <tr ng-repeat="(key, item) in data" class="ng-scope">
                                    <td ng-bind-html="item.icon" class="f20 ng-binding">
                                        <i class="md md-brightness-4 cyan darken-2 icon-color"></i>
                                    </td>
                                    <td class="ng-binding"></td>
                                    <td class="ng-binding">20GB</td>
                                    <td class="ng-binding">30GB</td>
                                    <td class="ng-binding">9.90£</td>
                                </tr>
                                <tr ng-repeat="(key, item) in data" class="ng-scope">
                                    <td ng-bind-html="item.icon" class="f20 ng-binding">
                                        <i class="md md-filter-tilt-shift amber lighten-2 icon-color"></i>
                                    </td>
                                    <td class="ng-binding"></td>
                                    <td class="ng-binding">30GB</td>
                                    <td class="ng-binding">50GB</td>
                                    <td class="ng-binding">19.90£</td>
                                </tr>
                                <tr ng-repeat="(key, item) in data" class="ng-scope">
                                    <td ng-bind-html="item.icon" class="f20 ng-binding">
                                        <i class="md md-brightness-5 purple lighten-1 icon-color"></i>
                                    </td>
                                    <td class="ng-binding"></td>
                                    <td class="ng-binding">50GB</td>
                                    <td class="ng-binding">80GB</td>
                                    <td class="ng-binding">29.90£</td>
                                </tr>
                                <tr ng-repeat="(key, item) in data" class="ng-scope">
                                    <td ng-bind-html="item.icon" class="f20 ng-binding">
                                        <i class="md md-brightness-5 red lighten-1 icon-color"></i>
                                    </td>
                                    <td class="ng-binding"></td>
                                    <td class="ng-binding">100GB</td>
                                    <td class="ng-binding">100GB</td>
                                    <td class="ng-binding">39.90£</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row" style="display:none">
            <div class="col-md-4">
                <div class="well white">
                    <legend>
                        Provided for all plans
                    </legend>
                    <br>
                    PHP memory limit 128Mb, unlimited subdomains and server alias, unlimited email accounts, unlimited MySQL databases, unlimited FTP accounts, backup suite, webmail, Apache or Nginx webserver, free HTTPS, antivirus and antispam, Wordpress security suite and apps manager.
                </div>
            </div>
            <div class="col-md-4">
                <div class="well white">
                    <legend>
                        Provided for all plans
                    </legend>
                    <br>
                    PHP memory limit 128Mb, unlimited subdomains and server alias, unlimited email accounts, unlimited MySQL databases, unlimited FTP accounts, backup suite, webmail, Apache or Nginx webserver, free HTTPS, antivirus and antispam, Wordpress security suite and apps manager.
                </div>
            </div>
            <div class="col-md-4">
                <div class="well white">
                    <legend>
                        Provided for all plans
                    </legend>
                    <br>
                    PHP memory limit 128Mb, unlimited subdomains and server alias, unlimited email accounts, unlimited MySQL databases, unlimited FTP accounts, backup suite, webmail, Apache or Nginx webserver, free HTTPS, antivirus and antispam, Wordpress security suite and apps manager.
                </div>
            </div>
        </div>
    </section>
@endsection
