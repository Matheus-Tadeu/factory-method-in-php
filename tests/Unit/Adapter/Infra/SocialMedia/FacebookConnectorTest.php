<?php

namespace Tests\Unit\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use PHPUnit\Framework\TestCase;
use App\Adapter\Infra\SocialMedia\FacebookRepository;

class FacebookConnectorTest extends TestCase
{
    private $facebookConnector;

    protected function setUp(): void
    {
        $this->facebookConnector = new FacebookRepository();
    }

    public function testCreatePost()
    {
        $content = 'Test content';
        $post = $this->facebookConnector->create('facebook', $content);

        $this->assertInstanceOf(SocialMedia::class, $post);
        $this->assertEquals($content, $post->getContent());
        $this->assertEquals('facebook', $post->getPlatform());
    }
}
