<?php

namespace App\Providers;

use App\Services\ImageHandle\UploadImage;
use Illuminate\Support\ServiceProvider;

class UploadImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('UploadImage', function () {
            return new UploadImage();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
