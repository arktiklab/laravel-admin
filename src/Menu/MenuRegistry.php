<?php

namespace Arktiklab\LaravelAdmin\Menu;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class MenuRegistry
{
    public function __construct(
        protected readonly Collection $slots = new Collection([
            new MenuSlot('sidebar'),
            new MenuSlot('user-menu'),
            new MenuSlot('nav-right'),
            new MenuSlot('nav-left'),
        ])
    ) {
    }

    public function slot(string $id): MenuSlot
    {
        $id = Str::slug($id);
        $slot = $this->slots->first(fn (MenuSlot $slot) => $slot->getId() == $id);
        if ($slot) {
            return $slot;
        }
        $slot = new MenuSlot($id);
        $this->slots->push($slot);

        return $slot;
    }
}
