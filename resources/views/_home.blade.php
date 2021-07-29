<div class="col-md-4">
    <div class="card">
        <div class="card-image">
            <img src="/assets/images/home/{{ $post->poster_image }}"
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
                    @if (HelperDataJsonToAttr($post, 'meta.moreUrl'))
                        <a href="{{ HelperDataJsonToAttr($post, 'meta.moreUrl') }}"
                            class="btn btn-link black-text"
                            title="{{ HelperDataJsonToAttr($post, 'meta.moreUrl') }}"
                            target="_blank">
                            {{ __('labels.generic.more') }}
                        </a>
                    @endif
                    @if (HelperDataJsonToAttr($post, 'meta.appUrl'))
                    <a href="{{ HelperDataJsonToAttr($post, 'meta.appUrl') }}"
                       class="btn btn-link black-text"
                       title="{{ HelperDataJsonToAttr($post, 'meta.appUrl') }}"
                       target="_blank">
                        {{ __('labels.generic.appLaunch') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>