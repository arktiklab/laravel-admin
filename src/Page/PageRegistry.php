<?php

namespace Arktiklab\LaravelAdmin\Page;

use Illuminate\Support\Collection;

final class PageRegistry
{
    use HasPage {
        page as make;
    }
    public function __construct(
        public readonly Collection $pages = new Collection()
    )
    {}

    public function newGroup(string $prefix)
    {

    }
}
