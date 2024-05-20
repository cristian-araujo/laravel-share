<?php

namespace CristianAraujo\Share\Services;

use CristianAraujo\Share\Contracts\ShareServiceContract;

abstract class ShareService implements ShareServiceContract
{
    protected string $url;
    protected ?string $title;

    public function __construct(string $url, ?string $title = null)
    {
        $this->url = $url;
        $this->title = $title;
    }

    abstract public function buildLink(): string;

    protected function buildQuery(array $params): string
    {
        return http_build_query($params);
    }
}
