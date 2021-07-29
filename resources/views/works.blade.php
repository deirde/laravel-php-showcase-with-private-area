@extends('layoutDefault')
@section('content')
    <section class="cards">
        <div class="page-header">
            <h1>
                <i class="md {{ __('labels.category.works.icon') }}"></i>
                {{ __('labels.category.works.title') }}
            </h1>
            <p class="lead">
                {!! __('labels.category.works.subtitle') !!}
            </p>
        </div>
        <div id="work-container" class="row">
            @each('_work', $posts, 'post')
        </div>
    </section>
    <style>
        @media (min-width: 1200px) {
            #work-container .col-lg-3:nth-child(4n+5) {
                clear: left;
            }
        }
        @media (max-width: 1199px) {
            #work-container .col-md-4:nth-child(3n+4) {
                clear: left;
            }
        }
    </style>
@endsection
