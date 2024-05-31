<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class TelegramService extends ShareService
{
    public function buildLink(): string
    {
        $base = Config::get('laravel-share.socials.telegram.uri');
        $params = [
            'url' => $this->url,
            'text' => $this->title,
        ];
        return $base . '?' . $this->buildQuery($params);
    }
}
