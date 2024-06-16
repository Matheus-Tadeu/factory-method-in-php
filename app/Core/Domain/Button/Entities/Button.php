<?php

namespace App\Core\Domain\Button\Entities;

class Button
{
    /**
     * @var string
     */
    private string $label;
    /**
     * @var string
     */
    private string $platform;

    /**
     * @param string $label
     * @param string $platform
     */
    public function __construct(string $label, string $platform)
    {
        $this->label = $label;
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->platform;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'platform' => $this->platform,
        ];
    }
}
