<div class="col-md-4 col-lg-3">
    <div class="card">
        <div class="card-image">
            <img src="/assets/images/works/{{ $post->poster_image }}"
                 class="activator" alt="{{ $post->title }}">
        </div>
        <div class="card-content">
            <p>
                <b>
                    {{ $post->title }}
                </b>
            </p>
            <p>
                {{ $post->excerpt }}
            </p>
            <div class="card-action clearfix">
                <div class="pull-right">
                    @if (HelperDataJsonToAttr($post, 'meta.goToWebsiteFullUrl'))
                        <a href="{{ HelperDataJsonToAttr($post, 'meta.goToWebsiteFullUrl') }}"
                            class="btn btn-link black-text"
                            title="{{ HelperDataJsonToAttr($post, 'meta.goToWebsite') }}"
                            target="_blank">
                            {{ __('labels.generic.open') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
