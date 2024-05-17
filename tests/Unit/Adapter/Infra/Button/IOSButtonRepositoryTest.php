<?php

namespace Tests\Unit\Adapter\Infra\Button;

use App\Adapter\Infra\Button\IOSButtonRepository;
use App\Core\Domain\Button\Entities\Button;
use PHPUnit\Framework\TestCase;

class IOSButtonRepositoryTest extends TestCase
{
    public function testCreateButton()
    {
        $repository = new IOSButtonRepository();
        $button = $repository->create('Test', 'IOS');

        $this->assertEquals('Test', $button->getLabel());
        $this->assertEquals('IOS', $button->getType());
        $this->assertInstanceOf(Button::class, $button);
    }
}
