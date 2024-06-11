<?php

namespace App\Core\Domain\SocialMidia\Entities;

class SocialMedia
{
    private $platform;
    private $content;

    public function __construct(string $platform, string $content)
    {
        $this->platform = $platform;
        $this->content = $content;
    }

    public function toArray(): array
    {
        return [
            'platform' => $this->platform,
            'content' => $this->content,
        ];
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
