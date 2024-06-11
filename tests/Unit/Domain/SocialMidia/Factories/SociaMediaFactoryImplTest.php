<?php

namespace Tests\Unit\Domain\SocialMidia\Factories;

use App\Core\Domain\SocialMidia\Entities\SocialMedia;
use App\Core\Domain\SocialMidia\Factories\SociaMediaFactoryImpl;
use App\Core\Domain\SocialMidia\Repositories\SocialMediaConnector;
use Tests\TestCase;

class SociaMediaFactoryImplTest extends TestCase
{
    public function testeCreatePost()
    {
        $socialMediaRepositoryMock = $this->createMock(SocialMediaConnector::class);
        $socialMediaRepositoryMock->method('create')->willReturn(new SocialMedia('facebook', 'Ok!'));

        $factory = new SociaMediaFactoryImpl(['facebook' => $socialMediaRepositoryMock]);
        $socialMedia = $factory->create('facebook', 'Ok!');

        $this->assertInstanceOf(SocialMedia::class, $socialMedia);
        $this->assertEquals('facebook', $socialMedia->getPlatform());
        $this->assertEquals('Ok!', $socialMedia->getContent());
    }

    public function testeCreatePostInvalidArgumentException()
    {
        $socialMediaRepositoryMock = $this->createMock(SocialMediaConnector::class);
        $socialMediaRepositoryMock->method('create')->will($this->throwException(new \InvalidArgumentException()));

        $factory = new SociaMediaFactoryImpl(['facebook' => $socialMediaRepositoryMock]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid platform type: teste');

        $factory->create('teste', 'Content');
    }
}
