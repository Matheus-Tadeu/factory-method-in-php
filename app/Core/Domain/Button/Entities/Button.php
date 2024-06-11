<?php

namespace App\Core\Domain\Button\Entities;

class Button
{
    private string $label;
    private string $platform;

    public function __construct(string $label, string $platform)
    {
        $this->label = $label;
        $this->platform = $platform;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->platform;
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'platform' => $this->platform,
        ];
    }
}
