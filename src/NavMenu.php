<?php

namespace Arktiklab\LaravelAdmin;

class NavMenu
{
    public string $name = '';

    public string $icon = '';

    public function __construct($name, $icon)
    {
        $this->name = $name;
        $this->icon = $icon;
    }
}
