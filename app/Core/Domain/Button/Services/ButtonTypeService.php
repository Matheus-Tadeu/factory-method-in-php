<?php

namespace App\Core\Domain\Button\Services;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Attribute\Factories\ButtonFactory;
use Illuminate\Support\Collection;

/**
 *
 */
class ButtonTypeService
{
    /**
     * @var ButtonFactory
     */
    private ButtonFactory $buttonFactory;

    /**
     * @param ButtonFactory $buttonFactory
     */
    public function __construct(ButtonFactory $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
    }

    /**
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button
    {
        return $this->buttonFactory->create($label, $platform);
    }

    /**
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return $this->buttonFactory->all();
    }
}
