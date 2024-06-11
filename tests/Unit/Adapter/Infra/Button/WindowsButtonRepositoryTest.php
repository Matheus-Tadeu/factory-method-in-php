<?php
namespace Tests\Unit\Adapter\Infra\Button;

use App\Adapter\Infra\Button\WindowsButtonRepository;
use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;

class WindowsButtonRepositoryTest extends TestCase
{
    public function testCreateButton()
    {
        $repository = new WindowsButtonRepository();
        $button = $repository->create('Test', 'windows');

        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('windows', $button->getType());
        $this->assertInstanceOf(Button::class, $button);
    }
}
