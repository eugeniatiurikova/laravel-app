<?php

namespace App\Providers;

use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Queries\UsersQueryBuilder;
use App\Services\Contract\Parser;
use App\Services\Contract\Social;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Parser::class,ParserService::class);
        $this->app->bind(Social::class,SocialService::class);

        $this->app->bind(NewsQueryBuilder::class);
        $this->app->bind(SourcesQueryBuilder::class);
        $this->app->bind(CategoriesQueryBuilder::class);
        $this->app->bind(UsersQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
