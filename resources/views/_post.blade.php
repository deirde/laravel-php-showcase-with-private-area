@extends('layoutDefault')
@section('content')
    <section class="cards">
        <div class="page-header">
            <h1>
                <i class="md md-photo"></i>
                {{ __('labels.category.products.title') }}
            </h1>
            <p class="lead">
                {{ __('labels.category.products.subtitle') }}
            </p>
        </div>
        <div id="work-container" class="row">
            @each('_product', $posts, 'post')
        </div>
    </section>
    <style>
        #work-container .col-md-4:nth-child(3n+4) {
            clear: left;
        }
    </style>
@endsection
