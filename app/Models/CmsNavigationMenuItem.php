<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CmsNavigationMenuItem extends Model
{
    protected $table = 'cms_navigation_menu_items';

    protected $fillable = [
        'menu_id',
        'label',
        'url',
        'target',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(CmsNavigationMenu::class, 'menu_id');
    }
}