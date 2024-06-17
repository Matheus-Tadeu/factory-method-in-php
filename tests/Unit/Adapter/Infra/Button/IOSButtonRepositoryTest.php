<?php

namespace Tests\Unit\Adapter\Infra\Button;

use App\Adapter\Infra\Button\ButtonRepository;
use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;

class IOSButtonRepositoryTest extends TestCase
{
    public function testCreateButton()
    {
        $repository = $this->createMock(ButtonRepository::class);
        $repository->method('create')
            ->willReturn(new Button('Test', 'ios'));

        $button = $repository->create('Test', 'ios');

        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('ios', $button->getType());
        $this->assertInstanceOf(Button::class, $button);
    }
}
