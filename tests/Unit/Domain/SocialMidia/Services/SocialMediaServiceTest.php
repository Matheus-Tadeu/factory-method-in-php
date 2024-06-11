<?php

namespace Tests\Unit\Domain\SocialMidia\Services;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Factories\SocialMediaFactory;
use App\Core\Domain\SocialMidia\Services\SocialMediaService;
use Tests\TestCase;

class SocialMediaServiceTest extends TestCase
{
    public function testPost()
    {
        $socialMediaFactory = $this->createMock(SocialMediaFactory::class);
        $socialMediaService = new SocialMediaService($socialMediaFactory);

        $platform = 'facebook';
        $content = 'Hello World!';
        $socialMedia = new SocialMedia($platform, $content);

        $socialMediaFactory->expects($this->once())
            ->method('create')
            ->with($platform, $content)
            ->willReturn($socialMedia);

        $this->assertEquals($socialMedia, $socialMediaService->post($platform, $content));
    }

}
