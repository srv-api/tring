<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class CmsNavigationMenu extends Model
{
    protected $table = 'cms_navigation_menus';

    protected $fillable = [
        'name',
        'slug',
        'location',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(CmsNavigationMenuItem::class, 'menu_id')
            ->orderBy('sort_order');
    }

    protected static function booted(): void
    {
        static::creating(function ($menu) {
            if (empty($menu->slug)) {
                $menu->slug = Str::slug($menu->name);
            }
        });
    }
}