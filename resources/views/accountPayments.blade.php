@extends('layoutDefault')
@section('content')
    <section>
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.accountPayments.icon') }}"></i>
                {{ __('labels.category.accountPayments.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.accountPayments.subtitle') !!}
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
            @include('_accountLinks', ['active' => 'payments'])
            <div class="col-md-6">
                @if (!$charges && !$invoices)
                    <div class="col-md-12" style="padding:0;margin-bottom:24px">
                        <div class="card no-margin">
                            <div class="table-responsive white">
                                <h3 class="table-title p-20">
                                    {{ __('labels.accountPayments.noEntries') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @else
                    @if ($invoices)
                        <div class="col-md-12" style="padding:0;margin-bottom:24px">
                            <div class="card no-margin">
                                <div class="table-responsive white">
                                    <h3 class="table-title p-20">
                                        {{ __('labels.accountPayments.block.0.title') }}
                                    </h3>
                                    <table class="account-payment-table table table-striped table-full table-full-small">
                                        <colgroup>
                                            <col class="auto-cell-size">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                {{ __('labels.accountPayments.date') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.number') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.amount') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @each('_accountPaymentsOutstanding', $invoices, 'item')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($charges)
                        <div class="col-md-12" style="padding:0">
                            <div class="card no-margin">
                                <div class="table-responsive white">
                                    <h3 class="table-title p-20">
                                        {{ __('labels.accountPayments.block.1.title') }}
                                    </h3>
                                    <table class="account-payment-table table table-striped table-full table-full-small">
                                        <colgroup>
                                            <col class="auto-cell-size">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                {{ __('labels.accountPayments.date') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.number') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.amount') }}
                                            </th>
                                            <th>
                                                {{ __('labels.accountPayments.action') }}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @each('_accountPaymentsHistory', $charges, 'item')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>
    <style>
        .account-payment-table a.btn {
            color: #fff;
        }
    </style>
@endsection