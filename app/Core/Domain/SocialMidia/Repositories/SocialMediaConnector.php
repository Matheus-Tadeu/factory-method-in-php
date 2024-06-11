<?php

namespace App\Core\Domain\SocialMidia\Repositories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

interface SocialMediaConnector
{
    public function create(string $platform, string $content): SocialMedia;
}
