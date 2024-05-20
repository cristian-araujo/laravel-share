<?php

return [
    'fontAwesomeVersion' => 5,
    'showShareText' => true,
    'socials' => [
        'facebook' => [
            'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'icon' => 'fab fa-facebook',
            'service' => \CristianAraujo\Share\Services\Socials\FacebookService::class,
        ],
        'twitter' => [
            'uri' => 'https://twitter.com/intent/tweet',
            'icon' => 'fab fa-twitter',
            'text' => 'Check this out!',
            'service' => \CristianAraujo\Share\Services\Socials\TwitterService::class,
        ],
        'reddit' => [
            'uri' => 'https://www.reddit.com/submit',
            'icon' => 'fab fa-reddit',
            'text' => 'Check this out!',
            'service' => \CristianAraujo\Share\Services\Socials\RedditService::class,
        ],
        'linkedin' => [
            'uri' => 'https://www.linkedin.com/shareArticle',
            'icon' => 'fab fa-linkedin',
            'service' => \CristianAraujo\Share\Services\Socials\LinkedInService::class,
        ],
        'whatsapp' => [
            'uri' => 'https://wa.me/?text=',
            'icon' => 'fab fa-whatsapp',
            'service' => \CristianAraujo\Share\Services\Socials\WhatsAppService::class,
        ],
        'telegram' => [
            'uri' => 'https://t.me/share/url',
            'icon' => 'fab fa-telegram',
            'service' => \CristianAraujo\Share\Services\Socials\TelegramService::class,
        ],
    ],
];
