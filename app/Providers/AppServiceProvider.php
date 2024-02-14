<?php

namespace App\Providers;

use App\Services\Veranda\IKaviCmsCacheReader;
use App\Services\Veranda\KaviCmsCacheReader;
use App\Services\Veranda\KaviCmsCacheWriter;
use Illuminate\Support\ServiceProvider;

$isFirst = true;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(IKaviCmsCacheReader::class, function () {
//            Cache::flush();
            error_log("cms singleton if bind\n");
            $cmsWriter = new KaviCmsCacheWriter();
            $cmsWriter->initCaches();
            return new KaviCmsCacheReader();
        });

//        $this->app->booting(function () {
//            error_log("laravel booting\n");
//            $cmsWriter = new KaviCmsCacheWriter();
//            $cmsWriter->initCaches();
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
