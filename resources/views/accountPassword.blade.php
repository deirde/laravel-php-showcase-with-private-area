@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.accountPassword.icon') }}"></i>
                {{ __('labels.category.accountPassword.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.accountPassword.subtitle') !!}
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
            @include('_accountLinks', ['active' => 'notifications'])
            <div class="row">
                <div class="col-md-5">
                    <div class="well white" id="forms-validation-container">
                        <form method="post" id="form-validation1" class="form-validation form-floating">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>
                                    {{ __('labels.accountPassword.block.0.title') }}
                                </legend>
                                <br/>
                                {{ __('labels.accountPassword.block.0.paragraph') }}
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.current_password') }}
                                    </label>
                                    <input type="password" name="old_password" minlength="6" maxlength="16"
                                        class="form-control" required="required"
                                        data-error="{{ __('labels.form.error.current_password') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.new_password') }}

                                    </label>
                                    <input type="password" name="new_password" minlength="6" maxlength="16"
                                           class="form-control" required="required"
                                           data-error="{{ __('labels.form.error.new_password') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.confirm_password') }}
                                    </label>
                                    <input type="password" name="confirm_new_password" minlength="6" maxlength="16"
                                           class="form-control" required="required"
                                           data-error="{{ __('labels.form.error.confirm_password') }}">
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