<?php

namespace App\Core\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use Illuminate\Support\Collection;

/**
 * Interface SocialMediaFactory
 *
 * This interface defines the contract for creating social media posts.
 *
 * @package App\Core\Domain\SocialMidia\Factories
 */
interface SocialMediaFactory
{
    /**
     * Create a new social media post.
     *
     * @param string $platform The platform to post to.
     * @param string $content The content of the post.
     *
     * @return SocialMedia The created social media post.
     */
    public function create(string $platform, string $content): SocialMedia;
}
