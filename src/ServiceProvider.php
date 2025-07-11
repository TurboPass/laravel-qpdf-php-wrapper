<?php

namespace ParadoxD300\LaravelQpdfPhpWrapper;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use ParadoxD300\QpdfPhpWrapper\Pdf;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton('Qpdf', function () {
            return new Pdf();
        });
    }
}
