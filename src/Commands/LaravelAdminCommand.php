<?php

namespace Arktiklab\LaravelAdmin\Commands;

use Illuminate\Console\Command;

class LaravelAdminCommand extends Command
{
    public $signature = 'laravel-admin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
