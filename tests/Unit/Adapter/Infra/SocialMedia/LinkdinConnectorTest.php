<?php

namespace Tests\Unit\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use PHPUnit\Framework\TestCase;
use App\Adapter\Infra\SocialMedia\LinkdinConnector;

class LinkdinConnectorTest extends TestCase
{
    private $linkdinConnector;

    protected function setUp(): void
    {
        $this->linkdinConnector = new LinkdinConnector();
    }

    public function testLogIn()
    {
        $result = $this->linkdinConnector->logIn();
        $this->assertTrue($result);
    }

    public function testLogOut()
    {
        $result = $this->linkdinConnector->logOut();
        $this->assertTrue($result);
    }

    public function testCreatePost()
    {
        $content = 'Test content';
        $post = $this->linkdinConnector->createPost($content);

        $this->assertInstanceOf(SocialMedia::class, $post);
        $this->assertEquals($content, $post->getContent());
        $this->assertEquals('linkdin', $post->getPlatform());
    }
}
