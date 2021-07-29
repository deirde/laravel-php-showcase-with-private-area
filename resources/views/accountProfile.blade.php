@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.accountProfile.icon') }}"></i>
                {{ __('labels.category.accountProfile.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.accountProfile.subtitle') !!}
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
            @include('_accountLinks', ['active' => 'profile'])
            <div class="col-md-6">
                <div class="well white" id="forms-validation-container">
                    <form method="post" id="form-validation1" class="form-validation form-floating"
                        novalidate="true" _lpchecked="1">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>
                                {{ __('labels.accountProfile.block.1.title') }}
                            </legend>
                            <br/>
                            {{ __('labels.accountProfile.block.1.paragraph') }}
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.name') }}
                                </label>
                                <input name="name" maxlength="64"
                                    class="form-control" required=""
                                    value="{{ ((isset($registry->name)) ? $registry->name : null) }}"
                                    data-error="{{ __('labels.form.error.name') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.bio') }}
                                </label>
                                <textarea name="bio" maxlength="512"
                                    class="form-control"
                                    data-error="{{ __('labels.form.error.bio') }}">{{ ((isset($registry->bio)) ? $registry->bio : null) }}</textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.url') }}
                                </label>
                                <input name="url" type="url" maxlength="128"
                                    class="form-control"
                                    value="{{ ((isset($registry->url)) ? $registry->url : null) }}"
                                    data-error="{{ __('labels.form.error.url') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.company') }}
                                </label>
                                <input name="company" maxlength="128"
                                    class="form-control"
                                    value="{{ ((isset($registry->company)) ? $registry->company : null) }}"
                                    data-error="{{ __('labels.form.error.company') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('labels.form.label.location') }}
                                </label>
                                <input name="location" maxlength="128"
                                    class="form-control"
                                    value="{{ ((isset($registry->location)) ? $registry->location : null) }}"
                                    data-error="{{ __('labels.form.error.location') }}">
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