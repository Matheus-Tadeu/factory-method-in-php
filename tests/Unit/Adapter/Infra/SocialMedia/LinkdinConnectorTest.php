<?php

namespace Tests\Unit\Adapter\Infra\SocialMedia;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use PHPUnit\Framework\TestCase;
use App\Adapter\Infra\SocialMedia\LinkdinRepository;

class LinkdinConnectorTest extends TestCase
{
    private $linkdinConnector;

    protected function setUp(): void
    {
        $this->linkdinConnector = new LinkdinRepository();
    }

    public function testCreatePost()
    {
        $content = 'Test';
        $post = $this->linkdinConnector->create($content, 'linkdin');

        $this->assertInstanceOf(SocialMedia::class, $post);
        $this->assertEquals('Test', $post->getContent());
        $this->assertEquals('linkdin', $post->getPlatform());
    }
}
