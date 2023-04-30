<?php

namespace Arktiklab\LaravelAdmin;

use Arktiklab\LaravelAdmin\Commands\LaravelAdminCommand;
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-admin_table')
            ->hasCommand(LaravelAdminCommand::class);
    }
}
