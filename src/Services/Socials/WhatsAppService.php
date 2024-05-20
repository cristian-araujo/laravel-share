<?php

namespace CristianAraujo\Share\Services\Socials;

use CristianAraujo\Share\Services\ShareService;
use Illuminate\Support\Facades\Config;

class WhatsAppService extends ShareService
{
    public function buildLink(): string
    {
        $base = Config::get('laravel-share.services.whatsapp.uri');
        return $base . urlencode($this->url);
    }
}
