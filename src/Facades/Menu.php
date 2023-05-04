<?php

namespace Arktiklab\LaravelAdmin\Facades;

use Arktiklab\LaravelAdmin\Menu\MenuRegistry;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Arktiklab\LaravelAdmin\Menu\MenuSlot slot(string $id)
 */
class Menu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return MenuRegistry::class;
    }
}
