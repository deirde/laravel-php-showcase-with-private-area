@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.login.icon') }}"></i>
                {{ __('labels.category.login.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.login.subtitle') !!}
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
            <div class="col-md-5">
                <div class="col-md-12" style="padding:0">
                    <div class="well">
                        <legend>
                            {{ __('labels.login.block.0.title') }}
                        </legend>
                        <br/>
                        {{ __('labels.login.block.0.paragraph.0') }}
                        <br/>
                        <a href="{{ HelperNavUrl(__('urls.recoverPassword')) }}"
                            title="{{ __('labels.nav.link.recoverPassword') }}">
                            {{ __('labels.login.block.0.paragraph.1') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="well white" id="forms-validation-container">
                    <form method="post" id="form-validation1" class="form-validation form-floating"
                        novalidate="true" _lpchecked="1">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>
                                {{ __('labels.login.block.1.title') }}
                            </legend>
                            <br/>
                            {{ __('labels.login.block.1.paragraph') }}
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.email') }}
                                </label>
                                <input name="email" type="email" maxlength="64"
                                    class="form-control" required=""
                                    value="@php echo (isset($_POST['email']) ? $_POST['email'] : '') @endphp"
                                    data-error="{{ __('labels.form.error.email') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.password') }}
                                </label>
                                <input type="password" name="password" maxlength="32"
                                    class="form-control" required=""
                                    value="@php echo (isset($_POST['password']) ? $_POST['password'] : '') @endphp"
                                    data-error="{{ __('labels.form.error.required') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary disabled">
                                    {{ __('labels.form.label.submit') }}
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection