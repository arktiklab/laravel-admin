<?php

namespace Arktiklab\LaravelAdmin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Arktiklab\LaravelAdmin\LaravelAdmin
 */
class LaravelAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Arktiklab\LaravelAdmin\LaravelAdmin::class;
    }
}
