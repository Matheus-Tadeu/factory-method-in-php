<?php

/**
 * Namespace for the Button Repositories
 */
namespace App\Core\Domain\Button\Repositories;

use App\Core\Domain\Button\Entities\Button;
use Illuminate\Support\Collection;

/**
 * Interface IButtonRepository
 *
 * This interface defines a contract for creating `Button` objects and retrieving all `Button` objects.
 */
interface IButtonRepository
{
    /**
     * Creates a new `Button` object with the provided label and platform.
     *
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button;

    /**
     * Retrieves all `Button` objects.
     *
     * @return Collection<Button>
     */
    public function all(): Collection;
}
