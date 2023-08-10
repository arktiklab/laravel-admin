<?php

namespace Arktiklab\LaravelAdmin\Menu;

use Illuminate\Support\Str;

final class MenuGroup extends MenuSlot
{
    public function __construct(
        public string $id,
        public string $name = '',
    ) {
        parent::__construct($id);
    }

    public function name($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function renderIcon(string $attr = null): string
    {
        return '';
    }

    public function isActive($path): bool
    {
        return (bool) collect($this->id)->first(fn (string $id) => Str::startsWith($path, $id));
    }
}
