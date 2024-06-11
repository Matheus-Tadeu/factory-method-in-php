<?php

namespace App\Adapter\Infra\Button;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Entities\ButtonType;
use App\Core\Domain\Button\Repositories\ButtonRepository;

class WindowsButtonRepository implements ButtonRepository
{
    private array $buttons;

    public function create(string $label, string $platform): Button
    {
        $button = new Button($label, $platform);
        $this->buttons[] = $button;
        return $button;
    }
}
