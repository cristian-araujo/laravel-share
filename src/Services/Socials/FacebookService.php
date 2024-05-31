<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class FacebookService extends ShareService
{
    public function buildLink(): string
    {
        $base = Config::get('laravel-share.socials.facebook.uri');
        return $base . urlencode($this->url);
    }
}
