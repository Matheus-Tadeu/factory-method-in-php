<?php

namespace Tests\Feature\Http\Controllers;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Services\SocialMediaService;
use Tests\TestCase;

class SocialMediaControllerTest extends TestCase
{
    public function testPostToSocialMedia()
    {
        $socialMediaService = $this->createMock(SocialMediaService::class);
        $socialMediaService->method('post')->willReturn(new SocialMedia( 'facebook', 'Conteudo'));

        $this->app->instance(SocialMediaService::class, $socialMediaService);

        $response = $this->postJson('api/postToSocialMedia/facebook', ['content' => 'Conteudo']);

        $response->assertStatus(201);
        $response->assertJson(['content' => 'Conteudo', 'platform' => 'facebook']);
    }

    public function testInvalidArgumentException()
    {
        $socialMediService = $this->createMock(SocialMediaService::class);
        $socialMediService->method('post')->will($this->throwException(new \InvalidArgumentException('Invalid platform type: instagram')));

        $this->app->instance(SocialMediaService::class, $socialMediService);

        $response = $this->postJson('api/postToSocialMedia/instagram', ['content' => 'Conteudo']);

        $response->assertStatus(422);
        $response->assertJson(['message' => 'The selected platform is invalid.']);
    }

    public function testCreateWithInvalidType()
    {
        $socialMediService = $this->createMock(SocialMediaService::class);
        $socialMediService->method('post')->will($this->throwException(new \InvalidArgumentException('Invalid platform type: invalid')));

        $this->app->instance(SocialMediaService::class, $socialMediService);

        $response = $this->postJson('api/postToSocialMedia/invalid', ['content' => 'Conteudo']);

        $response->assertStatus(422);
        $response->assertJson(['message' => 'The selected platform is invalid.']);
    }

    public function testCreateWithoutcPlatform()
    {
        $response = $this->postJson('api/postToSocialMedia/invalid', ['content' => 'Conteudo']);
        $response->assertStatus(422);
        $response->assertJson(['message' => 'The selected platform is invalid.']);
    }
}
