<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class RedditService extends ShareService
{
    public function buildLink(): string
    {
        $this->title ??= Config::get('laravel-share.services.reddit.text');
        $base = Config::get('laravel-share.services.reddit.uri');
        $params = [
            'title' => $this->title,
            'url' => $this->url,
        ];
        return $base . '?' . $this->buildQuery($params);
    }
}
