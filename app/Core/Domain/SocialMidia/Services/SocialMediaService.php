<?php

namespace App\Core\Domain\SocialMidia\Services;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Factories\SocialMediaFactory;

class SocialMediaService
{
    private SocialMediaFactory $socialMediaFactory;

    public function __construct(SocialMediaFactory $socialMediaFactory)
    {
        $this->socialMediaFactory = $socialMediaFactory;
    }

    public function post(string $platform, string $content): SocialMedia
    {
        return $this->socialMediaFactory->create($platform, $content);
    }
}
