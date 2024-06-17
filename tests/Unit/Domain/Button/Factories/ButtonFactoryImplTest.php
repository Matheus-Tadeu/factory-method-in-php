<?php
namespace Tests\Unit\Domain\Button\Factories;

use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;
use App\Core\Domain\Button\Repositories\IButtonRepository;
use App\Core\Domain\Button\Factories\ButtonFactoryImpl;

class ButtonFactoryImplTest extends TestCase
{
    public function testeCreateButton()
    {
        $buttonRepositoryMock = $this->createMock(IButtonRepository::class);
        $buttonRepositoryMock->method('create')->willReturn(new Button('Test', 'ios'));

        $factory = new ButtonFactoryImpl($buttonRepositoryMock);
        $button = $factory->create('Test', 'ios');

        $this->assertInstanceOf(Button::class, $button);
        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('ios', $button->getType());
    }
}
