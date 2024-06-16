<?php

namespace App\Core\Domain\Button\Factories;

use App\Core\Domain\Attribute\Factories\ButtonFactory;
use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Repositories\IButtonRepository;
use Illuminate\Support\Collection;

class ButtonFactoryImpl implements ButtonFactory
{
    /**
     * @var IButtonRepository
     */
    private IButtonRepository $buttonRepository;

    /**
     * @param IButtonRepository $buttonRepository
     */
    public function __construct(IButtonRepository $buttonRepository)
    {
        $this->buttonRepository = $buttonRepository;
    }

    /**
     * @return Collection<Button>
     */
    public function all(): Collection
    {
        return $this->buttonRepository->all();
    }

    /**
     * @param string $label
     * @param string $platform
     * @return Button
     */
    public function create(string $label, string $platform): Button
    {
        return $this->buttonRepository->create($label, $platform);
    }
}
