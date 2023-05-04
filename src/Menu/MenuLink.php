<?php

namespace Arktiklab\LaravelAdmin\Menu;

use Arktiklab\LaravelAdmin\Contract\Menu\MenuItemContract;
use Illuminate\Support\Str;

final class MenuLink implements MenuItemContract
{
    public static function make(string $name,
        string $id,
        string $route,
        ?string $icon = null,
        ?string $permission = null
    ): MenuLink {
        return new self(
            $name,
            $id,
            $route,
            $icon,
            $permission
        );
    }

    public function __construct(
        public string $name,
        public string $id,
        public string $route,
        public ?string $icon = null,
        public ?string $permission = null,
    ) {
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function id(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function defineGate(string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    public function route(string $name): self
    {
        $this->route = $name;

        return $this;
    }

    public function icon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function isActive(string $path): bool
    {
        return (bool) collect($this->id)
            ->first(fn (string $id) => Str::startsWith($path, $id));
    }

    public function renderIcon(string $attrs): string
    {
        // TODO: Implement renderIcon() method.
        return '';
    }
}
