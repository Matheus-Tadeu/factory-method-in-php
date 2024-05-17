<?php

namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;

class ButtonFactoryImpl implements ButtonFactory
{
    private $buttonRepositories;

    public function __construct(array $buttonRepositories)
    {
        $this->buttonRepositories = $buttonRepositories;
    }

    public function createButton(string $label, string $type): Button
    {
        if (!isset($this->buttonRepositories[$type])) {
            throw new \InvalidArgumentException("Invalid button type: $type");
        }

        return $this->buttonRepositories[$type]->create($label);
    }
}
