<?php

use Arktiklab\LaravelAdmin\Facades\Menu;
use Arktiklab\LaravelAdmin\Menu\MenuLink;

it('can verify manu slot register', function () {
    $slot = Menu::slot('test-sidebar');
    $slot
        ->addItem(fn (MenuLink $item) => $item
            ->id('admin.test')
            ->name('Test Menu')
            ->route('admin.test')
            ->icon('test-icon')
        );

    expect($slot->getId())
        ->toBe('test-sidebar');
    expect($slot->items()->count())
        ->toBe(1);
});
