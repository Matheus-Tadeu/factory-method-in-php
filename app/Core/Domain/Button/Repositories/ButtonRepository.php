<?php

namespace App\Core\Domain\Button\Repositories;

use App\Core\Domain\Button\Entities\Button;

interface ButtonRepository
{
    public function create(string $label): Button;
}
