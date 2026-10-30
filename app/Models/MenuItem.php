<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'price_label',
        'description',
        'tags',
        'image',
        'details',
        'sort_order',
        'is_featured',
        'is_available',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'tags' => 'array',
        'details' => 'array',
        'is_featured' => 'boolean',
        'is_available' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        if (!empty($this->price_label)) {
            return $this->price_label;
        }
        return $this->price > 0 ? '$' . rtrim(rtrim(number_format((float) $this->price, 2), '0'), '.') : '';
    }

    public function getDietaryTagsAttribute(): array
    {
        return $this->tags ?? [];
    }

    public function getImageUrlAttribute(): string
    {
        // 1. If explicit 'menu/...' path is set on the model
        if ($this->image && str_starts_with($this->image, 'menu/')) {
            if (file_exists(public_path('images/' . $this->image . '.jpg'))) {
                return asset('images/' . $this->image . '.jpg');
            }
            if (file_exists(public_path('images/' . $this->image . '.png'))) {
                return asset('images/' . $this->image . '.png');
            }
        }

        // 2. High-priority resolution from enhanced menu images folder
        $catName = $this->category?->name ?? '';
        $slug = \Illuminate\Support\Str::slug($this->name);
        if (in_array($catName, ['Wine', 'Beer'])) {
            $slug = \Illuminate\Support\Str::slug($catName . '-' . $this->name);
        }
        if (file_exists(public_path('images/menu/' . $slug . '.jpg'))) {
            return asset('images/menu/' . $slug . '.jpg');
        }

        // 3. Fallback to image property if file exists
        if ($this->image) {
            if (file_exists(public_path('images/' . $this->image . '.png'))) {
                return asset('images/' . $this->image . '.png');
            }
            if (file_exists(public_path('images/' . $this->image . '.jpg'))) {
                return asset('images/' . $this->image . '.jpg');
            }
            if (file_exists(public_path('images/' . $this->image . '.webp'))) {
                return asset('images/' . $this->image . '.webp');
            }
            if (file_exists(public_path('images/' . $this->image))) {
                return asset('images/' . $this->image);
            }
            if (str_starts_with($this->image, 'http')) {
                return $this->image;
            }
        }

        return asset('images/samosas.png');
    }
}
