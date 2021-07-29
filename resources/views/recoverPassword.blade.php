@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.recoverPassword.icon') }}"></i>
                {{ __('labels.category.recoverPassword.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.recoverPassword.subtitle') !!}
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
                    <div class="well white">
                        <legend>
                            {{ __('labels.recoverPassword.block.0.title') }}
                        </legend>
                        <br/>
                        {{ __('labels.recoverPassword.block.0.paragraph.0') }}
                        {{ __('labels.recoverPassword.block.0.paragraph.1') }}
                        {{ __('labels.recoverPassword.block.0.paragraph.2') }}
                        <br/>
                        <a href="{{ HelperNavUrl(__('urls.contact')) }}"
                            title="{{ __('labels.nav.link.contact') }}" target="_blank">
                            {{ __('labels.nav.link.contact') }}
                        </a>
                    </div>
                </div>
                <div class="col-md-12" style="padding:0">
                    <div class="well">
                        <legend>
                            {{ __('labels.recoverPassword.block.1.title') }}
                        </legend>
                        <br/>
                        {{ __('labels.recoverPassword.block.1.paragraph.0') }}
                        {{ __('labels.recoverPassword.block.1.paragraph.1') }}
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
                                    {{ __('labels.recoverPassword.block.2.title') }}
                                </legend>
                                <br/>
                                {{ __('labels.recoverPassword.block.2.paragraph') }}
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
                                    <button type="submit" class="btn btn-primary disabled">
                                        {{ __('labels.form.label.submit') }}
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection