<?php

namespace Tests\Unit\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use PHPUnit\Framework\TestCase;
use App\Adapter\Infra\SocialMedia\FacebookConnector;

class FacebookConnectorTest extends TestCase
{
    private $facebookConnector;

    protected function setUp(): void
    {
        $this->facebookConnector = new FacebookConnector();
    }

    public function testLogIn()
    {
        $result = $this->facebookConnector->logIn();
        $this->assertTrue($result);
    }

    public function testLogOut()
    {
        $result = $this->facebookConnector->logOut();
        $this->assertTrue($result);
    }

    public function testCreatePost()
    {
        $content = 'Test content';
        $post = $this->facebookConnector->createPost($content);

        $this->assertInstanceOf(SocialMedia::class, $post);
        $this->assertEquals($content, $post->getContent());
        $this->assertEquals('facebook', $post->getPlatform());
    }
}
