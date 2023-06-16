<?php

namespace Arktiklab\LaravelAdmin;

use Arktiklab\LaravelAdmin\Commands\LaravelAdminCommand;
use Arktiklab\LaravelAdmin\Http\Controllers\LoginController;
use Arktiklab\LaravelAdmin\Http\Controllers\LogoutController;
use Arktiklab\LaravelAdmin\Menu\Defaults\SidebarMenu;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViews()
//            ->hasMigration('create_laravel-admin_table')
            ->hasCommand(LaravelAdminCommand::class);
    }

    public function bootingPackage()
    {
        $this->setupInertia();
        $prefix = config('arktik-admin.path');
        Route::prefix($prefix)
            ->middleware(['web'])
            ->group(function () {
                Route::get('/', LoginController::class);
                Route::middleware('auth')
                    ->get('logout', LogoutController::class);
            });
        Route::macro('arktikadmin', function (callable $callback) use ($prefix) {
            Route::prefix($prefix)
                ->group($callback(...));
        });
    }

    public function packageBooted()
    {
        $this->registerMenuBuilder();
    }

    protected function registerMenuBuilder()
    {
        SidebarMenu::make();
    }

    private function setupInertia()
    {
        Inertia::version(function () {
            if (config('app.env') == 'testing') {
                return;
            }

            return md5_file(public_path('vendor/laravel-admin/manifest.json'));
        });

        Inertia::setRootView('laravel-admin::layout.app');
    }
}
