<?php

namespace App\Providers;

use App\Models\Article;
use App\Observers\ArticleObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Article::observe(ArticleObserver::class);
    }
}
