<?php

namespace App\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;

class FacebookConnector implements SocialMediaConnector
{
    private array $posts;

    public function logIn(): bool
    {
        echo "Log in to Facebook\n";
        return true;
    }

    public function logOut(): bool
    {
        echo "Log out of Facebook\n";
        return true;
    }

    public function createPost($content): SocialMedia
    {
        $post = new SocialMedia($content, 'facebook');
        $this->posts[] = $post;
        echo "Post to Facebook: " . $content . "\n";
        return $post;
    }

}
