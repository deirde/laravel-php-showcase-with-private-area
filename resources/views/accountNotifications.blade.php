@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.accountNotifications.icon') }}"></i>
                {{ __('labels.category.accountNotifications.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.accountNotifications.subtitle') !!}
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
                <div class="col-md-6">
                    <div class="well white" id="forms-validation-container">
                        <form method="post" id="form-validation1" class="form-validation form-floating">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>
                                    {{ __('labels.accountNotifications.block.title') }}
                                </legend>
                                <br/>
                                {{ __('labels.accountNotifications.block.paragraph') }}
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="opt_in_email"
                                                {{ ((isset($registry->opt_in_email) && $registry->opt_in_email == true) ? "checked" : null) }}>
                                                {{ __('labels.form.label.opt_in_email') }}
                                        </label>
                                    </div>
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