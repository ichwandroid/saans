<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

    /**
     * Get a content setting by key with a fallback default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $item = static::where('key', $key)->first();

        return $item ? $item->value : $default;
    }

    /**
     * Set/store a content setting.
     */
    public static function set(string $key, mixed $value, ?string $group = null): static
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
            ]
        );
    }
}
