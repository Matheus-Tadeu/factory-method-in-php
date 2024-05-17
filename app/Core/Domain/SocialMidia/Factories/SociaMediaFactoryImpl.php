<?php

namespace App\Core\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

class SociaMediaFactoryImpl implements SocialMediaFactory
{
    private $sociaMediaRepositories;

    public function __construct(array $sociaMediaRepositories)
    {
        $this->sociaMediaRepositories = $sociaMediaRepositories;
    }

    public function createPost(string $platform, string $content): SocialMedia
    {
        if (!isset($this->sociaMediaRepositories[$platform])) {
            throw new \InvalidArgumentException("Invalid platform type: $platform");
        }
        $repository = $this->sociaMediaRepositories[$platform];
        $repository->logIn();
        $post = $this->sociaMediaRepositories[$platform]->createPost($content);
        $repository->logOut();

        return $post;
    }
}
