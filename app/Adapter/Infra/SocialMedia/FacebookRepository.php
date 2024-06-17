<?php

namespace App\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;
use Illuminate\Support\Collection;

/**
 * Class FacebookRepository
 *
 * This class implements the SocialMediaConnector interface and provides
 * the functionality to interact with Facebook social media posts.
 *
 * @package App\Adapter\Infra\SocialMedia
 */
class FacebookRepository implements SocialMediaConnector
{
    /**
     * @var array
     *
     * An array to store the social media posts.
     */
    public array $posts;

    /**
     * Create a new social media post.
     *
     * This method creates a new social media post with the provided platform name
     * and content, adds it to the $posts array, and returns it.
     *
     * @param string $platform The platform to post to.
     * @param string $content The content of the post.
     *
     * @return SocialMedia The created social media post.
     */
    public function create(string $platform, string $content): SocialMedia
    {
        $post = new SocialMedia($platform, $content);
        $this->posts[] = $post;
        return $post;
    }
}
