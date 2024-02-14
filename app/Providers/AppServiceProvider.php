<?php

namespace App\Providers;

use App\Services\KaviCms\IKaviCmsCacheReader;
use App\Services\KaviCms\KaviCmsCacheReader;
use App\Services\KaviCms\KaviCmsCacheWriter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IKaviCmsCacheReader::class, function () {
            $cmsWriter = new KaviCmsCacheWriter();
            $cmsWriter->initCaches();
            return new KaviCmsCacheReader();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
