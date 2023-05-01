<?php

declare(strict_types=1);

use Arktiklab\LaravelAdmin\System\ArktikMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends ArktikMigration
{
    protected string $tableName = 'staffs';

    public function up()
    {
        Schema::create($this->prefix.$this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('super_admin')->default(false)->index();
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->prefix.$this->tableName);
    }
};
