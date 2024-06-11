<?php

namespace App\Core\Domain\Button\Services;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Attribute\Factories\ButtonFactory;

class ButtonTypeService
{
    private $buttonFactory;

    public function __construct(ButtonFactory $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
    }

    public function create(string $label, string $platform): Button
    {
        return $this->buttonFactory->create($label, $platform);
    }
}
