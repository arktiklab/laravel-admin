<?php

namespace Arktiklab\LaravelAdmin\Menu;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class MenuSlot
{
    public function __construct(
        protected string $id,
        protected Collection $items = new Collection(),
        protected Collection $sections = new Collection(),
        protected Collection $groups = new Collection()
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function addItem(\Closure|MenuLink $callback, $after = null): self
    {
        $item = $callback instanceof MenuLink ? $callback : tap(new MenuLink('', '', ''), $callback);

        $index = false;

        if ($after) {
            $index = $this->items->search(fn (MenuLink $item) => $item->id == $after);
        }

        if ($index) {
            $this->items->splice($index + 1, 0, [$item]);

            return $this;
        }

        $this->items->push($item);

        return $this;
    }

    /**
     * Add Multiple Items
     *
     * @return $this
     */
    public function addItems(array $items): self
    {
        $this->items->push(...$items);

        return $this;
    }

    public function items(): Collection
    {
        return $this->items
            ->filter(fn (MenuLink $item) => ! $item->permission || Auth::user()->can($item->permission));
    }

    public function sections(): Collection
    {
        return $this->sections;
    }

    public function groups(): Collection
    {
        return $this->groups;
    }

    public function section(string $id): MenuSection
    {
        $section = $this->sections->first(fn (MenuSection $section) => $section->getId() == $id);
        if ($section) {
            return $section;
        }
        $section = new MenuSection($id);
        $this->sections->push();

        return $section;

    }

    public function group(string $id): MenuGroup
    {
        $group = $this->groups->first(fn (MenuGroup $group) => $group->getId() == $id);
        if ($group) {
            return $group;
        }
        $group = new MenuGroup($id);
        $this->groups->push($group);

        return $group;
    }
}
