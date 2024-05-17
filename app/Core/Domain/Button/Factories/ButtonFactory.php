<?php

namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;

interface ButtonFactory
{
    public function createButton(String $label, string $type): Button;
}
