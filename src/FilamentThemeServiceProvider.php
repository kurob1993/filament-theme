<?php

namespace Krakatau\FilamentTheme;

use Illuminate\Support\ServiceProvider;

class FilamentThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../resources/css/theme.css' => resource_path('vendor/krakatau/filament-theme/theme.css'),
            __DIR__.'/../resources/css/tailwind.config.js' => resource_path('vendor/krakatau/filament-theme/tailwind.config.js'),
        ], 'krakatau-filament-theme-resources');
    }
}
