<?php

namespace Arktiklab\LaravelAdmin\Page;

use Illuminate\Support\Collection;

class PageRoute
{
    protected string $name;

    protected Collection $permissions;

    protected Collection $middlewares;

    public function __construct(
        public readonly string $uri,
        public readonly PageView $view,
    ) {
        $this->permissions = new Collection();
        $this->middlewares = new Collection();
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
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
