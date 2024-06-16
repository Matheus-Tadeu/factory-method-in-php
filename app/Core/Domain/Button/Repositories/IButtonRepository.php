<?php

namespace App\Core\Domain\Button\Repositories;

use App\Core\Domain\Button\Entities\Button;
use Illuminate\Support\Collection;

interface IButtonRepository
{
    /**
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button;

    /**
     * @return Collection<Button>
     */
    public function all(): Collection;
}
