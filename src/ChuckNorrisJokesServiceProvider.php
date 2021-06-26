<?php

namespace Rigasyahrul\ChuckNorrisJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Rigasyahrul\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Rigasyahrul\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/chuck-norris')
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config' => base_path('config')
        ], 'config');

        if (! class_exists('CreateJokesTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_jokes_table.php.stub' => database_path('migrations/' . date('Y_m_d_His'). time()) . '_create_jokes_table.php'
            ], 'database');
        }

        Route::get(config('chuck-norris.route'), ChuckNorrisController::class);
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokesFactory();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }
}
