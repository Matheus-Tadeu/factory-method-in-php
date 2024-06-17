<?php

namespace Tests\Unit\Domain\Button\Repositories;

use App\Core\Domain\Button\Repositories\IButtonRepository;
use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;

class ButtonRepositoryTest extends TestCase
{
    public function testCreateButton()
    {
        $buttonRepository = $this->createMock(IButtonRepository::class);
        $buttonRepository->method('create')->willReturn(new Button('Test', 'ios'));

        $button = $buttonRepository->create('Test', 'ios');

        $this->assertInstanceOf(Button::class, $button);
        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('ios', $button->getType());
    }
}
