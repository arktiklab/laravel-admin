<?php

namespace Arktiklab\LaravelAdmin\Contract\Menu;

interface MenuItemContract
{
    /**
     * Manu Item name setter
     */
    public function name(string $name): self;

    /**
     * Set menu item unique identifier
     */
    public function id(string $id): self;

    /**
     * Set permission who can see this menu item
     */
    public function defineGate(string $permission): self;

    /**
     * Set Menu Item link
     */
    public function route(string $name): self;

    /**
     * Menu Item icon setter
     */
    public function icon(string $icon): self;

    /**
     * Determines whether given menu link is considered active
     */
    public function isActive(string $path): bool;

    /**
     * Render the HTML for the given icon.
     */
    public function renderIcon(string $attrs): string;
}
