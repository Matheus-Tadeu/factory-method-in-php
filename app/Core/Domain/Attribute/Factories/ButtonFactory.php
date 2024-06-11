<?php

namespace App\Core\Domain\Attribute\Factories;

use App\Core\Domain\Button\Entities\Button;

interface ButtonFactory
{
    public function create(String $label, string $platform): Button;
}
