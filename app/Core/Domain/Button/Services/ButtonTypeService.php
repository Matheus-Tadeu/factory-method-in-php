<?php

/**
 * Namespace for the Button Services
 */
namespace App\Core\Domain\Button\Services;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Factories\ButtonFactory;
use Illuminate\Support\Collection;

/**
 * Class ButtonTypeService
 *
 * This class is responsible for creating and retrieving instances of `Button` objects.
 * It uses the `ButtonFactory` class to perform these operations.
 */
class ButtonTypeService
{
    /**
     * @var ButtonFactory
     *
     * An instance of the `ButtonFactory` class.
     */
    private ButtonFactory $buttonFactory;

    /**
     * ButtonTypeService constructor.
     *
     * @param ButtonFactory $buttonFactory
     *
     * Initializes the `$buttonFactory` property.
     */
    public function __construct(ButtonFactory $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
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
        return $this->buttonFactory->create($label, $platform);
    }

    /**
     * Retrieves all `Button` objects.
     *
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return $this->buttonFactory->all();
    }
}
