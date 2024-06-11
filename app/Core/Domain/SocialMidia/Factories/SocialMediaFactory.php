<?php

namespace App\Core\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

interface SocialMediaFactory
{
    public function create(string $platform, string $content): SocialMedia;
}
