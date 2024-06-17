<?php

/**
 * Namespace for the Button Entities
 */
namespace App\Core\Domain\Button\Entities;

/**
 * Class Button
 *
 * This class represents a button with a label and platform.
 */
class Button
{
    /**
     * @var string
     *
     * The label of the button.
     */
    private string $label;

    /**
     * @var string
     *
     * The platform of the button.
     */
    private string $platform;

    /**
     * Button constructor.
     *
     * @param string $label
     * @param string $platform
     *
     * Initializes the `$label` and `$platform` properties.
     */
    public function __construct(string $label, string $platform)
    {
        $this->label = $label;
        $this->platform = $platform;
    }

    /**
     * Retrieves the label of the button.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Retrieves the platform of the button.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->platform;
    }

    /**
     * Converts the button to an array.
     *
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
