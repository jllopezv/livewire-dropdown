<?php

namespace Jllopezv\LivewireDropdown;

use Illuminate\Support\ServiceProvider;

class LivewireDropdownServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/livewire-dropdown', 'livewire-dropdown');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'livewire-dropdown');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/jllopezv/livewire-dropdown'),
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/livewire-dropdown'),
        ], 'livewire-dropdown');
    }

    public function register()
    {
    }
}
