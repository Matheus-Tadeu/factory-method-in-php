<?php

/**
 * Namespace for the Social Media Entities
 */
namespace App\Core\Domain\SocialMidia\Entities;

/**
 * Class SocialMedia
 *
 * This class represents a social media post with a platform and content.
 */
class SocialMedia
{
    /**
     * @var string
     *
     * The platform of the social media post.
     */
    private string $platform;

    /**
     * @var string
     *
     * The content of the social media post.
     */
    private string $content;

    /**
     * SocialMedia constructor.
     *
     * @param string $platform
     * @param string $content
     *
     * Initializes the `$platform` and `$content` properties.
     */
    public function __construct(string $platform, string $content)
    {
        $this->platform = $platform;
        $this->content = $content;
    }

    /**
     * Converts the social media post to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'platform' => $this->platform,
            'content' => $this->content,
        ];
    }

    /**
     * Retrieves the platform of the social media post.
     *
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * Retrieves the content of the social media post.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
