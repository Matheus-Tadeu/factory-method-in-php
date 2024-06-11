<?php

namespace App\Providers;

use App\Adapter\Infra\Button\IOSButtonRepository;
use App\Adapter\Infra\Button\WindowsButtonRepository;
use App\Adapter\Infra\SocialMedia\FacebookRepository;
use App\Adapter\Infra\SocialMedia\LinkdinRepository;
use App\Core\Domain\Attribute\Factories\ButtonFactory;
use App\Core\Domain\Button\Factories\ButtonFactoryImpl;
use App\Core\Domain\SocialMidia\Factories\SocialMediaFactory;
use App\Core\Domain\SocialMidia\Factories\SociaMediaFactoryImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ButtonFactory::class, function ($app) {
            $buttonRepositories = [
                'windows' => $app->make(WindowsButtonRepository::class),
                'ios' => $app->make(IOSButtonRepository::class),
            ];
            return new ButtonFactoryImpl($buttonRepositories);
        });
        $this->app->bind(SocialMediaFactory::class, function ($app) {
            $socialMediaRepositories = [
                'facebook' => $app->make(FacebookRepository::class),
                'linkedin' => $app->make(LinkdinRepository::class),
            ];
            return new SociaMediaFactoryImpl($socialMediaRepositories);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
