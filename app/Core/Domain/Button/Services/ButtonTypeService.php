<?php

namespace App\Core\Domain\Button\Services;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Factories\ButtonFactory;

class ButtonTypeService
{
    private $buttonFactory;

    public function __construct(ButtonFactory $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
    }

    public function initialize(string $label, string $type): Button
    {
        return $this->buttonFactory->createButton($label, $type);
    }
}
