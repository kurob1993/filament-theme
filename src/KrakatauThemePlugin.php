<?php

namespace Krakatau\FilamentTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\View\PanelsRenderHook;

class KrakatauThemePlugin implements Plugin
{
    public static function make(): self
    {
        return new self;
    }

    public function getId(): string
    {
        return 'krakatau-theme';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->viteTheme($this->resolveThemeEntry())
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn () => view('krakatau-theme::title-topbar')
            );
    }

    public function boot(Panel $panel): void
    {
        //
    }

    protected function resolveThemeEntry(): string
    {
        $manifestPath = public_path('build/manifest.json');

        if (! file_exists($manifestPath)) {
            return 'vendor/krakatau/filament-theme/resources/css/theme.css';
        }

        $manifest = json_decode(file_get_contents($manifestPath), true) ?? [];

        $packageEntry = 'packages/Krakatau/filament-theme/resources/css/theme.css';
        $vendorEntry = 'vendor/krakatau/filament-theme/resources/css/theme.css';

        if (array_key_exists($packageEntry, $manifest)) {
            return $packageEntry;
        }

        return $vendorEntry;
    }
}
