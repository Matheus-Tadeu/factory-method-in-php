<?php

namespace App\Core\Domain\SocialMidia\Repositories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

interface SocialMediaConnector
{
    public function logIn(): bool;

    public function logOut(): bool;

    public function createPost($content): SocialMedia;
}
