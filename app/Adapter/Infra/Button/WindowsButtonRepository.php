<?php

namespace App\Adapter\Infra\Button;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Repositories\ButtonRepository;

class WindowsButtonRepository implements ButtonRepository
{
    private array $buttons;

    public function create(string $label): Button
    {
        $button = new Button($label,'WINDOWS');
        $this->buttons[] = $button;
        return $button;
    }
}
