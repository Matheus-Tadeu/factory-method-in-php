<?php

namespace App\Providers;

use App\Adapter\Infra\Button\IOSButtonRepository;
use App\Adapter\Infra\Button\WindowsButtonRepository;
use App\Adapter\Infra\SocialMedia\FacebookConnector;
use App\Adapter\Infra\SocialMedia\LinkdinConnector;
use App\Core\Domain\Button\Factories\ButtonFactory;
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
                'WINDOWS' => $app->make(WindowsButtonRepository::class),
                'IOS' => $app->make(IOSButtonRepository::class),
            ];
            return new ButtonFactoryImpl($buttonRepositories);
        });
        $this->app->bind(SocialMediaFactory::class, function ($app) {
            $socialMediaRepositories = [
                'facebook' => $app->make(FacebookConnector::class),
                'linkedin' => $app->make(LinkdinConnector::class),
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
