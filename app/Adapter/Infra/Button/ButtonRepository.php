<?php

/**
 * Namespace for the Button Infrastructure Adapter
 */
namespace App\Adapter\Infra\Button;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Repositories\IButtonRepository;
use App\Models\Button as ButtonModel;
use Illuminate\Support\Collection;

/**
 * Class ButtonRepository
 *
 * This class implements the `IButtonRepository` interface and provides methods to create and retrieve `Button` objects.
 */
class ButtonRepository implements IButtonRepository
{
    /**
     * Creates a new `Button` object with the provided label and platform.
     *
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button
    {
        $button = ButtonModel::create([
            'label' => $label,
            'platform' => $platform,
        ]);

        return new Button($button->label, $button->platform);
    }

    /**
     * Retrieves all `Button` objects.
     *
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return ButtonModel::all();
    }
}
