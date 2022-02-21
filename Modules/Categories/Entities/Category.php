<?php

namespace Modules\Categories\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;


class Category extends Model
{
    use DeletedBy,Sluggable;


    public const ICON = [
        1 => [
            'type' => 1,
            'title' => 'پرینتر',
            'icon' => 'flaticon-printer'
        ],
        2 => [
            'type' => 2,
            'title' => 'کامپیوتر',
            'icon' => 'flaticon-monitor'
        ],
        3 => [
            'type' => 3,
            'title' => 'ماشین های اداری',
            'icon' => 'flaticon-monitor'
        ],
        4 => [
            'type' => 4,
            'title' => 'استوک',
            'icon' => 'flaticon-printer'
        ]


    ];

    protected $fillable = ['icon','parent_id', 'type', 'title', 'slug'];

    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function Products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function Children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeProductCategories($query)
    {
        return $query->where('type', ltrim(Product::class, "Modules\\"));
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
