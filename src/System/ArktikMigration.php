<?php

declare(strict_types=1);

namespace Arktiklab\LaravelAdmin\System;

use Illuminate\Database\Migrations\Migration;

class ArktikMigration extends Migration
{
    public function __construct(
        public string $prefix = ''
    ) {
        $this->prefix = config('arktik-admin.table_prefix', 'arktik_');
    }
}
