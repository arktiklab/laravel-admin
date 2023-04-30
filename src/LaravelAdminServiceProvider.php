<?php

namespace Arktiklab\LaravelAdmin;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Arktiklab\LaravelAdmin\Commands\LaravelAdminCommand;
use Arktiklab\LaravelAdmin\Http\Controllers\{LoginController, LogoutController};

class LaravelAdminServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-admin')
            ->hasConfigFile('arktik-admin')
//            ->hasViews()
//            ->hasMigration('create_laravel-admin_table')
            ->hasCommand(LaravelAdminCommand::class);
    }

    public function bootingPackage()
    {
        $prefix = config('arktik-admin.path');
        Route::macro('arktikadmin', function (callable|null $callback = null) use ($prefix) {
            Route::prefix($prefix)
                ->middleware(['web'])
                ->group(function () use ($callback) {
                    Route::get('/', LoginController::class);
                    Route::middleware('auth')
                        ->get('logout', LogoutController::class);
                    if (!is_null($callback) && is_callable($callback)) {
                        $callback();
                    }
                });
        });
    }
}
