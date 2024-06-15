<?php
namespace Tests\Unit\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;
use App\Core\Domain\Button\Repositories\ButtonRepository;
use App\Core\Domain\Button\Factories\ButtonFactoryImpl;

class ButtonFactoryImplTest extends TestCase
{
    public function testeCreateButton()
    {
        $buttonRepositoryMock = $this->createMock(ButtonRepository::class);
        $buttonRepositoryMock->method('create')->willReturn(new Button('Test', 'IOS'));

        $factory = new ButtonFactoryImpl(['IOS' => $buttonRepositoryMock]);
        $button = $factory->create('Test', 'IOS');

        $this->assertInstanceOf(Button::class, $button);
        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('IOS', $button->getType());
    }

    public function testeInvalidArgumentException()
    {
        $buttonRepositoryMock = $this->createMock(ButtonRepository::class);
        $buttonRepositoryMock->method('create')->will($this->throwException(new \InvalidArgumentException()));

        $factory = new ButtonFactoryImpl(['IOS' => $buttonRepositoryMock]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid button type: ANDROID');

        $factory->create('Test', 'ANDROID');
    }
}
