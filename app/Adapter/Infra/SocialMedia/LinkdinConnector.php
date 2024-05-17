<?php

namespace App\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;

class LinkdinConnector implements SocialMediaConnector
{
    private array $posts;

    public function logIn(): bool
    {
        echo "Log in to Linkdin\n";
        return true;
    }

    public function logOut(): bool
    {
        echo "Log out of Linkdin\n";
        return true;
    }

    public function createPost($content): SocialMedia
    {
        $post = new SocialMedia($content, 'linkdin');
        $this->posts[] = $content;
        echo "Post to Linkdin: " . $content . "\n";
        return $post;
    }

}
