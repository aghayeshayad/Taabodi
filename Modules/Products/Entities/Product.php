<?php

namespace Modules\Products\Entities;

use App\Comment;
use App\Http\Traits\Dashboard\DeletedBy;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;
use Modules\Discounts\Entities\Discount;
use Modules\Questions\Entities\Question;
use Modules\Tags\Entities\Tag;

class Product extends Model
{

    use Sluggable;
    protected $table="products";

    /**
     * Product colors
     *
     * @var array
     */
    public const COLORS = [
        1 => 'سبز',
        2 => 'سفید',
        3 => 'سیاه'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Products table fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'images', 'vip','count','price','status',
         'discount', 'discount_count', 'category_id', 'subcategory_id', 'sub_subcategory_id'
    ];

    /**
     * Upload product image and set these path for image attribute value
     */
    public function setImageAttribute($value)
    {
        if ($value) {
            $ext = $value->getClientOriginalExtension();
            $name = time() . '.' . $ext;
            $path = public_path('/uploads/products/image');
            $value->move($path, $name);
            $this->attributes['image'] = $name;
        }
    }

    public function setImagesAttribute($value)
    {
        if ($value) {
            $file_names = [];

            foreach ($value as $item) {
                $ext = $item->getClientOriginalExtension();
                $name = time(). rand() . '.' . $ext;
                $path = public_path('/uploads/products/images');

                $item->move($path, $name);

                array_push($file_names, $name);
            }

            $this->attributes['images'] = json_encode($file_names);
        }
    }

    public function getTypeAttribute()
    {
        if($this->best_sellers) {
            return 'پرفروش';
        } elseif($this->vip) {
            return 'ویژه';
        } elseif($this->best_sellers && $this->vip) {
            return 'پروفروش ، ویژه';
        }
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'موجود' : 'ناموجود';
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("/uploads/products/image/$value") : null;
    }

    public function getImagesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }


    public function Tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_relations', 'tag_id', 'model_id')
            ->withPivotValue(['model_type' => ltrim(self::class, "Modules\\")])->withTimestamps();
    }

    public function Informations()
    {
        return $this->hasOne(ProductInformation::class, 'product_id');
    }

    public function Category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilterWithCategory($query, $id, $type)
    {
        $resultQuery = $query;

        if($type == 0) {
            $resultQuery = $query->where('category_id', $id);
        } elseif ($type == 1) {
            $resultQuery = $query->where('subcategory_id', $id);
        } else {
            $resultQuery = $query->where('sub_subcategory_id', $id);
        }

        return $resultQuery;
    }
}
