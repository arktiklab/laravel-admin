<?php

namespace Arktiklab\LaravelAdmin\Page;

use Illuminate\Support\Collection;

final class PageView
{
    public function __construct(
        protected string $name = '',
        public readonly Collection $data = new Collection()
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function name(string $view): self
    {
        $this->name = $view;

        return $this;
    }

    public function with(array $data): self
    {
        $this->data->push(...$data);

        return $this;
    }
}
