<?php

namespace CristianAraujo\Share;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use CristianAraujo\Share\Contracts\ShareServiceContract;

class Share
{
    protected ?string $url = null;
    protected ?string $title = null;
    protected array $options = [];
    protected string $html = '';
    protected array $generatedUrls = [];
    protected array $icons = [];

    public function __construct(string $url = null, ?string $title = null, array $options = [])
    {
        $this->url = $url;
        $this->title = $title;
        $this->options = $options;
    }

    public static function page(string $url, ?string $title = null, array $options = []): self
    {
        return new self($url, $title, $options);
    }

    public static function currentPage(?string $title = null, array $options = []): self
    {
        $url = request()->getUri();
        return new self($url, $title, $options);
    }

    public function __call($method, $parameters)
    {
        $serviceConfig = config("laravel-share.socials.$method");

        if (!$serviceConfig || !isset($serviceConfig['service'])) {
            throw new \Exception("Service configuration for $method does not exist.");
        }

        $serviceClass = $serviceConfig['service'];

        if (!class_exists($serviceClass)) {
            throw new \Exception("Service class for $method does not exist.");
        }

        /** @var ShareServiceContract $serviceInstance */
        $serviceInstance = App::make($serviceClass, [
            'url' => $this->url,
            'title' => $this->title,
        ]);

        $this->buildLink($method, $serviceInstance->buildLink(), $serviceConfig['icon']);
        return $this;
    }

    public function getRawLinks(): string|array
    {
        return count($this->generatedUrls) === 1
            ? Arr::first($this->generatedUrls)
            : $this->generatedUrls;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    protected function buildLink(string $provider, string $url, string $icon): void
    {
        $this->rememberRawLink($provider, $url, $icon);
    }

    protected function rememberRawLink(string $provider, string $socialNetworkUrl, string $icon): void
    {
        $this->generatedUrls[$provider] = $socialNetworkUrl;
        $this->icons[$provider] = $icon;
    }

    public function render(): string
    {
        return View::make('laravel-share::socials', [
            'links' => $this->generatedUrls,
            'icons' => $this->icons,
            'options' => $this->options,
        ])->render();
    }
}
