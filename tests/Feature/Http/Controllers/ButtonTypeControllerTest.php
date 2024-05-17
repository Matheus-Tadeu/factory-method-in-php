<?php

namespace Tests\Feature\Http\Controllers;

use App\Core\Domain\Button\Entities\Button;
use App\Core\Domain\Button\Services\ButtonTypeService;
use Tests\TestCase;

class ButtonTypeControllerTest extends TestCase
{
    public function testCreate()
    {
        $buttonTypeService = $this->createMock(ButtonTypeService::class);
        $buttonTypeService->method('initialize')->willReturn(new Button('Test', 'IOS'));

        $this->app->instance(ButtonTypeService::class, $buttonTypeService);

        $response = $this->postJson('api/button', ['label' => 'Test', 'type' => 'IOS']);

        $response->assertStatus(201);
        $response->assertJson(['label' => 'Test', 'type' => 'IOS']);
    }

    public function testInvalidArgumentException()
    {
        $buttonTypeService = $this->createMock(ButtonTypeService::class);
        $buttonTypeService->method('initialize')->will($this->throwException(new \InvalidArgumentException('Invalid button type')));

        $this->app->instance(ButtonTypeService::class, $buttonTypeService);

        $response = $this->postJson('api/button', ['label' => 'Test', 'type' => 'ANDROID']);

        $response->assertStatus(400);
    }

    public function testCreateWithInvalidType()
    {
        $buttonTypeService = $this->createMock(ButtonTypeService::class);
        $buttonTypeService->method('initialize')->will($this->throwException(new \InvalidArgumentException('Invalid button type')));

        $this->app->instance(ButtonTypeService::class, $buttonTypeService);

        $response = $this->postJson('api/button', ['label' => 'Test', 'type' => 'Invalid']);

        $response->assertStatus(422);
    }

    public function testCreateWithoutLabel()
    {
        $response = $this->postJson('api/button', ['type' => 'IOS']);

        $response->assertStatus(422);
    }

    public function testCreateWithoutType()
    {
        $response = $this->postJson('api/button', ['label' => 'Test']);

        $response->assertStatus(422);
    }
}
