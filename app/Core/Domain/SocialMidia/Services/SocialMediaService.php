<?php

namespace App\Core\Domain\SocialMidia\Services;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Factories\SocialMediaFactory;
use Illuminate\Support\Collection;

/**
 * Class SocialMediaService
 *
 * This service handles the creation of social media posts.
 *
 * @package App\Core\Domain\SocialMidia\Services
 */
class SocialMediaService
{
    /**
     * @var SocialMediaFactory
     */
    private SocialMediaFactory $socialMediaFactory;

    /**
     * SocialMediaService constructor.
     *
     * @param SocialMediaFactory $socialMediaFactory
     */
    public function __construct(SocialMediaFactory $socialMediaFactory)
    {
        $this->socialMediaFactory = $socialMediaFactory;
    }

    /**
     * Create a new social media post.
     *
     * @param string $platform The platform to post to.
     * @param string $content The content of the post.
     *
     * @return SocialMedia The created social media post.
     */
    public function post(string $platform, string $content): SocialMedia
    {
        return $this->socialMediaFactory->create($platform, $content);
    }
}
