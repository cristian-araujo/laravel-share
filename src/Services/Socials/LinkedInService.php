<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class LinkedInService extends ShareService
{
    public function buildLink(): string
    {
        $base = Config::get('laravel-share.services.linkedin.uri');
        $params = [
            'mini' => true,
            'url' => $this->url,
            'title' => $this->title,
            'summary' => '',
        ];
        return $base . '?' . $this->buildQuery($params);
    }
}
