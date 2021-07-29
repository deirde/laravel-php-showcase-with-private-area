@extends('layoutDefault')
@section('content')
    <section class="cards">
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.blog.icon') }}"></i>
                {{ __('labels.category.blog.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.blog.subtitle') !!}
            </p>
        </div>
        <div id="work-container" class="row">
            @each('_post', $posts, 'post')
        </div>
    </section>
    <style>
        #work-container .col-md-4:nth-child(3n+4) {
            clear: left;
        }
    </style>
@endsection
