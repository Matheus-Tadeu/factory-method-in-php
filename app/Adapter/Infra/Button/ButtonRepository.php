<?php

namespace App\Adapter\Infra\Button;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Repositories\IButtonRepository;
use App\Models\Button as ButtonModel;
use Illuminate\Support\Collection;

class ButtonRepository implements IButtonRepository
{
    /**
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button
    {
        $button = ButtonModel::create([
            'label' => $label,
            'platform' => $platform,
        ]);

        return new Button($button->label, $button->platform);
    }

    /**
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return ButtonModel::all();
    }
}
