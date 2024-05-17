<?php

namespace App\Core\Domain\Button\Entities;

class Button
{
    private $label;
    private $type;

    public function __construct(string $label, string $type)
    {
        $this->label = $label;
        $this->type = $type;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'type' => $this->type,
        ];
    }
}
