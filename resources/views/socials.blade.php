<div id="social-links">
    <ul>
        @if(config('laravel-share.showShareText', false))
        <li>{{ trans('laravel-share::translations.share') }}</li>
        @endif
        @foreach ($links as $provider => $url)
            <li>
                <a href="{{ $url }}" class="social-button {{ $options['class'] ?? '' }}" id="{{ $options['id'] ?? '' }}" title="{{ $options['title'] ?? '' }}" rel="{{ $options['rel'] ?? '' }}"><span class="{{ $icons[$provider] }}"></span></a>
            </li>
        @endforeach
    </ul>
</div>
