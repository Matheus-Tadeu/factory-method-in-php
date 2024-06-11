<?php

namespace App\Core\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

class SociaMediaFactoryImpl implements SocialMediaFactory
{
    private array $sociaMediaRepositories;

    public function __construct(array $sociaMediaRepositories)
    {
        $this->sociaMediaRepositories = $sociaMediaRepositories;
    }

    public function create(string $platform, string $content): SocialMedia
    {
        if (!isset($this->sociaMediaRepositories[$platform])) {
            throw new \InvalidArgumentException("Invalid platform type: $platform");
        }

        return $this->sociaMediaRepositories[$platform]->create($platform, $content);
    }
}
