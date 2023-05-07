<?php

namespace Arktiklab\LaravelAdmin\Page;

use Illuminate\Support\Collection;

class PageGroup
{
    use HasPage;

    protected string $name;

    public function __construct(
        public readonly string $prefix,
        public readonly Collection $pages = new Collection(),
        public readonly Collection $middlewares = new Collection(),
        public readonly Collection $permissions = new Collection()
    ) {
    }

    public function middlewares(array $middlewares): self
    {
        $this->middlewares->push(...$middlewares);

        return $this;
    }

    public function permissions(array $scopes): self
    {
        $this->permissions->push(...$scopes);

        return $this;
    }
}
