<?php

namespace Arktiklab\LaravelAdmin\Facades;

use Arktiklab\LaravelAdmin\Menu\MenuRegistry;
use Illuminate\Support\Facades\Facade;

/**
 * @method static slot(string $id):\Arktiklab\LaravelAdmin\Menu\MenuSlot
 */
class Menu extends Facade
{

    protected static function getFacadeAccessor()
    {
        return MenuRegistry::class;
    }
}
