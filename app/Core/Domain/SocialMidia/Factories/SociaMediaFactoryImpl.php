<?php

namespace App\Core\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * Class SociaMediaFactoryImpl
 *
 * This class implements the SocialMediaFactory interface and provides
 * the functionality to create social media posts for different platforms.
 *
 * @package App\Core\Domain\SocialMidia\Factories
 */
class SociaMediaFactoryImpl implements SocialMediaFactory
{
    /**
     * @var array
     *
     * An associative array where the keys are the names of the social media platforms
     * and the values are the corresponding repository objects.
     */
    private array $sociaMediaRepositories;

    /**
     * SociaMediaFactoryImpl constructor.
     *
     * @param array $sociaMediaRepositories An associative array of social media repositories.
     */
    public function __construct(array $sociaMediaRepositories)
    {
        $this->sociaMediaRepositories = $sociaMediaRepositories;
    }

    /**
     * Create a new social media post.
     *
     * This method uses the provided platform name to select the appropriate repository
     * from the $sociaMediaRepositories array. It then calls the repository's create method
     * to create a new social media post.
     *
     * @param string $platform The platform to post to.
     * @param string $content The content of the post.
     *
     * @return SocialMedia The created social media post.
     *
     * @throws InvalidArgumentException If the provided platform name is not found in the $sociaMediaRepositories array.
     */
    public function create(string $platform, string $content): SocialMedia
    {
        if (!isset($this->sociaMediaRepositories[$platform])) {
            throw new InvalidArgumentException("Invalid platform type: $platform");
        }

        return $this->sociaMediaRepositories[$platform]->create($platform, $content);
    }
}
