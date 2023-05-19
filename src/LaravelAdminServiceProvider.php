<?php

namespace Arktiklab\LaravelAdmin;

use Arktiklab\LaravelAdmin\Commands\LaravelAdminCommand;
use Arktiklab\LaravelAdmin\components\Menubar;
use Arktiklab\LaravelAdmin\components\Topbar;
use Arktiklab\LaravelAdmin\Http\Controllers\LoginController;
use Arktiklab\LaravelAdmin\Http\Controllers\LogoutController;
use Arktiklab\LaravelAdmin\Menu\Defaults\SidebarMenu;
use Illuminate\Support\Facades\Route;
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
            ->name('laravel-arktik-admin')
            ->hasConfigFile('arktik-admin')
            ->hasViews('arktik-admin')
            ->hasAssets()
//            ->hasMigration('create_laravel-admin_table')
            ->hasCommand(LaravelAdminCommand::class)
            ->hasViewComponents('arktik', Menubar::class, Topbar::class);
    }

    public function bootingPackage(): void
    {
        $prefix = config('arktik-admin.path');
        Route::prefix($prefix)
            ->middleware(['web'])
            ->group(function () {
                Route::get('/login', LoginController::class);
                Route::middleware('auth')
                    ->get('logout', LogoutController::class);

                $navList = [
                    'dashboard' => new NavMenu('Dashboard', 'home'),
                    'team' => new NavMenu('Team', 'user'),
                    'projects' => new NavMenu('Projects', 'folder'),
                    'calender' => new NavMenu('Calender', 'calendar'),
                    'documents' => new NavMenu('Documents', 'document'),
                ];
                Route::get('/', fn () => view('arktik-admin::Home', ['navMenu' => $navList]));
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
}
