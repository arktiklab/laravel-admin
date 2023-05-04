<?php

namespace Arktiklab\LaravelAdmin\Menu;

use Illuminate\Support\Str;

final class MenuSection extends MenuSlot
{
    public function __construct(
        public string $id,
        public string $name = '',
        public string $route = '',
        public ?string $icon = null,
    ) {
        parent::__construct($id);
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

    public function renderIcon(?string $attr = null): string
    {
        return '';
    }

    public function isActive(string $path): bool
    {
        return Str::startsWith($path, $this->id);
    }

    public function hasActive(string $path): bool
    {
        if ($this->isActive($path)) {
            return true;
        }

        return (bool) $this->items->first(fn (MenuLink $item) => Str::startsWith($path, $item->id));
    }
}
