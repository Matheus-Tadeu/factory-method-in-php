<?php

namespace Tests\Unit\Domain\Button\Services;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Factories\ButtonFactory;
use App\Core\Domain\Button\Services\ButtonTypeService;
use PHPUnit\Framework\TestCase;

class ButtonTypeServiceTest extends TestCase
{
    public function testInitializeWithValidLabelAndType()
    {
        $buttonFactory = $this->createMock(ButtonFactory::class);
        $buttonFactory->method('createButton')->willReturn(new Button('Test', 'IOS'));

        $buttonTypeService = new ButtonTypeService($buttonFactory);

        $button = $buttonTypeService->initialize('Test', 'IOS');

        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('IOS', $button->getType());
        $this->assertInstanceOf(Button::class, $button);
    }
}
