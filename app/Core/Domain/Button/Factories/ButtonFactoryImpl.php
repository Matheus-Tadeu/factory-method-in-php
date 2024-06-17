<?php

/**
 * Namespace for the Button Factories
 */
namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Repositories\IButtonRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Collection;

/**
 * Class ButtonFactoryImpl
 *
 * This class implements the `ButtonFactory` interface and provides methods to create and retrieve `Button` objects.
 */
class ButtonFactoryImpl implements ButtonFactory
{
    /**
     * @var IButtonRepository
     *
     * The repository for `Button` objects.
     */
    private IButtonRepository $buttonRepository;

    /**
     * ButtonFactoryImpl constructor.
     *
     * @param IButtonRepository $buttonRepository
     *
     * Initializes the `$buttonRepository` property.
     */
    public function __construct(IButtonRepository $buttonRepository)
    {
        $this->buttonRepository = $buttonRepository;
    }

    /**
     * Retrieves all `Button` objects.
     *
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return $this->buttonRepository->all();
    }

    /**
     * Creates a new `Button` object with the provided label and platform.
     *
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button
    {
        return $this->buttonRepository->create($label, $platform);
    }
}
