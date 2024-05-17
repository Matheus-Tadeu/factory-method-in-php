<?php

namespace Tests\Unit\Domain\Button\Repositories;

use App\Core\Domain\Button\Repositories\ButtonRepository;
use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;

class ButtonRepositoryTest extends TestCase
{
    public function testCreateButton()
    {
        $buttonRepository = $this->createMock(ButtonRepository::class);
        $buttonRepository->method('create')->willReturn(new Button('Test', 'IOS'));

        $button = $buttonRepository->create('Test', 'IOS');

        $this->assertInstanceOf(Button::class, $button);
        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('IOS', $button->getType());
    }
}
