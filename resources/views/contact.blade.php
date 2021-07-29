@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.contact.icon') }}"></i>
                {{ __('labels.category.contact.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.contact.subtitle') !!}
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
                    <div class="well white" id="forms-validation-container">
                        <div>
                            <form method="post" id="form-validation1"
                                class="form-validation form-floating"
                                novalidate="true" _lpchecked="1">
                                {{ csrf_field() }}
                                <fieldset>
                                    <legend>
                                        {{ __('labels.contact.block.0.title') }}
                                    </legend>
                                    <br/>
                                    {{ __('labels.contact.block.0.paragraph') }}
                                    <div class="form-group">
                                        <label class="control-label">
                                            {{ __('labels.form.label.email') }}
                                        </label>
                                        <input name="email" type="email" maxlength="64"
                                            class="form-control" required=""
                                            value="@php echo (isset($_POST['email']) ? $_POST['email'] : '') @endphp"
                                            data-error="{{ __('labels.form.error.email') }}">
                                        <div class="help-block with-errors"></div>
                                        <input type="hidden" name="form-id" value="subscribe">
                                        <button type="submit" class="btn btn-primary disabled">
                                            {{ __('labels.form.label.submit') }} <i class="md md-send"></i>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding:0">
                    <div class="well white">
                        <legend>
                            {{ __('labels.contact.block.1.title') }}
                        </legend>
                        <br/>
                        <address>
                            {!! __('labels.contact.block.1.paragraph.0') !!}
                        </address>
                        <address class="no-margin">
                            {!! __('labels.contact.block.1.paragraph.1') !!}
                        </address>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="well" id="forms-validation-container">
                    <div>
                        <form method="post" id="form-validation2"
                            class="form-floating"
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
                                    <input type="text" name="name"
                                        class="form-control" required=""
                                        value="@php echo (isset($_POST['name']) ? $_POST['name'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.required') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.email') }}
                                    </label>
                                    <input type="email" name="email"
                                        class="form-control" required=""
                                        value="@php echo (isset($_POST['email']) ? $_POST['email'] : '') @endphp"
                                        data-error="{{ __('labels.form.error.email') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.whatFor') }}
                                    </label>
                                    <select name="whatFor" class="form-control" required=""
                                        data-error="{{ __('labels.form.error.required') }}">
                                        <option value=""></option>
                                        <option value="1">
                                            {{ __('labels.form.select.quote.whatFor.0') }}
                                        </option>
                                        <option value="2">
                                            {{ __('labels.form.select.quote.whatFor.1') }}
                                        </option>
                                        <option value="3">
                                            {{ __('labels.form.select.quote.whatFor.2') }}
                                        </option>
                                        <option value="4">
                                            {{ __('labels.form.select.quote.whatFor.3') }}
                                        </option>
                                        <option value="5">
                                            {{ __('labels.form.select.quote.whatFor.4') }}
                                        </option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        {{ __('labels.form.label.provideDetail') }}
                                    </label>
                                    <textarea name="details"
                                        class="form-control" required=""
                                        data-error="{{ __('labels.form.error.required') }}">@php echo (isset($_POST['details']) ? $_POST['details'] : '') @endphp</textarea>
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
    </section>
@endsection