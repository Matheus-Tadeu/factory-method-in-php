<?php

namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Attribute\Factories\ButtonFactory;
use App\Core\Domain\Button\Entities\Button;

class ButtonFactoryImpl implements ButtonFactory
{
    private $buttonRepositories;

    public function __construct(array $buttonRepositories)
    {
        $this->buttonRepositories = $buttonRepositories;
    }

    public function create(string $label, string $platform): Button
    {
        if (!isset($this->buttonRepositories[$platform])) {
            throw new \InvalidArgumentException("Invalid button type: $platform");
        }

        return $this->buttonRepositories[$platform]->create($label, $platform);
    }
}
