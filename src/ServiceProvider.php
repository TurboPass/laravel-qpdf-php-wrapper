<?php

namespace ParadoxD300\LaravelQpdfPhpWrapper;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use ParadoxD300\QpdfPhpWrapper\Pdf;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/qpdf.php', 'qpdf'
        );

        $this->app->singleton('Qpdf', function ($app) {
            $executablePath = $app['config']->get('qpdf.executable_path');
            return new Pdf($executablePath);
        });
    }

    public function boot(): void
    {
        // Publish the configuration file to the Laravel application's config directory
        $this->publishes([
            __DIR__.'/../config/qpdf.php' => config_path('qpdf.php'),
        ], 'qpdf-config');
    }
}
