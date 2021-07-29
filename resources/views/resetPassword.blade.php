@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.resetPassword.icon') }}"></i>
                {{ __('labels.category.resetPassword.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.resetPassword.subtitle') !!}
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
                            {{ __('labels.resetPassword.block.0.title') }}
                        </legend>
                        <br/>
                        {{ __('labels.resetPassword.block.0.paragraph.0') }}
                        <br/>
                        <br/>
                        {{ __('labels.resetPassword.block.0.paragraph.1') }}
                        {{ __('labels.resetPassword.block.0.paragraph.2') }}
                        {{ __('labels.resetPassword.block.0.paragraph.3') }}
                        {{ __('labels.resetPassword.block.0.paragraph.4') }}
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
                                    {{ __('labels.resetPassword.block.1.title') }}
                                </legend>
                                <br/>
                                {{ __('labels.resetPassword.block.1.paragraph') }}
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.email') }}
                                    </label>
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