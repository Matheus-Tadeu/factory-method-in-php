<?php

namespace App\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;

class LinkdinRepository implements SocialMediaConnector
{
    private array $posts;
    public function create(string $platform, string $content): SocialMedia
    {
        $post = new SocialMedia($content, $platform);
        $this->posts[] = $content;
        return $post;
    }
}
