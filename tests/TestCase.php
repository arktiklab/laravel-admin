<?php

namespace Arktiklab\LaravelAdmin\Tests;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Arktiklab\LaravelAdmin\LaravelAdminServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Arktiklab\\LaravelAdmin\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
        Route::arktikadmin();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelAdminServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-admin_table.php.stub';
        $migration->up();
        */
    }
}
