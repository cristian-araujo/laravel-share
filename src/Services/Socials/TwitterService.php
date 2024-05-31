<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class TwitterService extends ShareService
{
    public function buildLink(): string
    {
        $this->title ??= Config::get('laravel-share.socials.twitter.text');
        $base = Config::get('laravel-share.socials.twitter.uri');
        $params = [
            'text' => $this->title,
            'url' => $this->url,
        ];
        return $base . '?' . $this->buildQuery($params);
    }
}
