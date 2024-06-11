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
        $buttonTypeService->method('create')->willReturn(new Button('Test', 'ios'));

        $this->app->instance(ButtonTypeService::class, $buttonTypeService);

        $response = $this->postJson('api/button', ['label' => 'Test', 'platform' => 'ios']);

        $response->assertStatus(201);
        $response->assertJson(['label' => 'Test', 'platform' => 'ios']);
    }

    public function testInvalidArgumentException()
    {
        $buttonTypeService = $this->createMock(ButtonTypeService::class);
        $buttonTypeService->method('create')->will($this->throwException(new \InvalidArgumentException('Invalid button type')));

        $this->app->instance(ButtonTypeService::class, $buttonTypeService);

        $response = $this->postJson('api/button', ['label' => 'Test', 'type' => 'ANDROID']);

        $response->assertStatus(422);
    }

    public function testCreateWithInvalidType()
    {
        $buttonTypeService = $this->createMock(ButtonTypeService::class);
        $buttonTypeService->method('create')->will($this->throwException(new \InvalidArgumentException('Invalid button type')));

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
