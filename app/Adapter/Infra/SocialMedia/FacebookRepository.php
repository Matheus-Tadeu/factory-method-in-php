<?php

namespace App\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;

class FacebookRepository implements SocialMediaConnector
{
    private array $posts;

    public function create(string $platform, string $content): SocialMedia
    {
        $post = new SocialMedia($platform, $content);
        $this->posts[] = $post;
        return $post;
    }

}
