@extends('layoutDefault')
@section('content')
    <section class="cards">
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.home.icon') }}"></i>
                {{ __('labels.category.home.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.home.subtitle') !!}
            </p>
        </div>
        @if (Session::has('flash'))
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12" style="padding:0">
                        @include('_flash', ['flash' => Session::get('flash')])
                    </div>
                </div>
            </div>
        @endif
        <div id="work-container" class="row">
            @each('_home', $posts, 'post')
        </div>
    </section>
    <style>
        #work-container .col-md-4:nth-child(3n+4) {
            clear: left;
        }
    </style>
@endsection
