<?php

/**
 * Namespace for the Button Factories
 */
namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;
use Illuminate\Support\Collection;

/**
 * Interface ButtonFactory
 *
 * This interface defines a contract for creating `Button` objects and retrieving all `Button` objects.
 */
interface ButtonFactory
{
    /**
     * Creates a new `Button` object with the provided label and platform.
     *
     * @param String $label
     * @param string $platform
     * @return Button
     */
    public function create(String $label, string $platform): Button;

    /**
     * Retrieves all `Button` objects.
     *
     * @return Collection<Button>
     */
    public function all(): Collection;
}
