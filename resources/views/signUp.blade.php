@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.signUp.icon') }}"></i>
                {{ __('labels.category.signUp.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.signUp.subtitle') !!}
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
            <div class="col-md-3"style="padding:0">
                <div class="col-md-12">
                    <div class="well">
                        <legend>
                            {{ __('labels.signup.block.0.title') }}
                        </legend>
                        <br/>
                        {{ __('labels.signup.block.0.paragraph.0') }}
                        <br>
                        <a href="{{ HelperNavUrl(__('urls.home')) }}"
                            title="{{ __('labels.nav.link.home') }}" target="_blank">
                            {{ __('labels.signup.block.0.paragraph.1') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="well white" id="forms-validation-container">
                    <div>
                        <form method="post" id="form-validation1"
                            class="form-validation form-floating"
                            novalidate="true" _lpchecked="1">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>
                                    {{ __('labels.signup.block.1.title') }}
                                </legend>
                                <br/>
                                {{ __('labels.signup.block.1.paragraph') }}
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
                                    <input type="password" name="password"
                                        class="password form-control" required="" pattern=".{6,18}" maxlength="18"
                                        value="@php echo (isset($_POST['password']) ? $_POST['password'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.wrongPassword') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.confirmPassword') }}
                                    </label>
                                    <input type="password"name="confirmPassword"
                                        class="confirmPassword form-control" required=""
                                        value="@php echo (isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.required') }}">
                                    <span class="confirmPasswordsNotMatch hidden">
                                        {{ __('labels.form.error.confirmPasswordsNotMatch') }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    @if (App()['config']['app']['feature_signup_enabled'])
                                        <button type="submit" class="btn btn-primary disabled">
                                            {{ __('labels.form.label.submit') }}
                                        </button>
                                    @else
                                        <h5 class="text-danger">
                                            {{ __('labels.signupNotEnabled') }}
                                        </h5>
                                    @endif
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .confirmPasswordsNotMatch {
            color: #F44336;
            margin-top: 5px;
            display: block;
        }
    </style>
    <script type="text/javacsript">
    $("#form-validation1").submit(function(e) {
        if ($(".password").val() !== $(".confirmPassword").val()) {
            $(".confirmPasswordsNotMatch").removeClass('hidden');
            e.preventDefault();
        } else {
            $(".confirmPasswordsNotMatch").addClass('hidden');
        }
    });
    </script>
@endsection