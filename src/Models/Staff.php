<?php

declare(strict_types=1);

namespace Arktiklab\LaravelAdmin\Models;

use Arktiklab\LaravelAdmin\Database\Factories\StaffFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected static function newFactory(): StaffFactory
    {
        return StaffFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'super_admin',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int,string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('arktik-admin.table_prefix').$this->getTable());

    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn (string $value, array $attributes) => $attributes['first_name'].' '.$attributes['last_name']
        );
    }

    public function gravatar(): Attribute
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return new Attribute(
            get: fn () => "https://www.gravatar.com/avatar/{$hash}?d=mp"
        );
    }
}
