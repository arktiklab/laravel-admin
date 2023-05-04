<?php

namespace Arktiklab\LaravelAdmin\Menu\Defaults;

use Arktiklab\LaravelAdmin\Facades\Menu;
use Arktiklab\LaravelAdmin\Menu\MenuLink;

final class SidebarMenu
{
    public static function make(): void
    {
        (new self())
            ->makeTopLevel();
    }

    protected function makeTopLevel(): self
    {
        $slot = Menu::slot('sidebar');
        $slot->addItem(fn (MenuLink $item) => $item
            ->id('admin.index')
            ->name('Dashboard')
            ->route('admin.index')
        );

        return $this;
    }
}
