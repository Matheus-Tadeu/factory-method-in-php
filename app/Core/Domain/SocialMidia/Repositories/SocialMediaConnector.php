<?php

/**
 * Namespace for the Social Media Repositories
 */
namespace App\Core\Domain\SocialMidia\Repositories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;

/**
 * Interface SocialMediaConnector
 *
 * This interface defines a contract for creating `SocialMedia` objects.
 */
interface SocialMediaConnector
{
    /**
     * Creates a new `SocialMedia` object with the provided platform and content.
     *
     * @param string $platform
     * @param string $content
     * @return SocialMedia
     */
    public function create(string $platform, string $content): SocialMedia;
}
