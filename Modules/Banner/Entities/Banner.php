<?php

namespace Modules\Banner\Entities;

use App\Http\Traits\Dashboard\uploadFiles;
use App\Http\Traits\Dashboard\DeletedBy;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class Banner extends Model
{
    use DeletedBy, Sluggable;

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['title', 'slug', 'image', 'link', 'type', 'status', 'deleted_by'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /* Courses Relations */

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("uploads/Banner/$this->id/$value") : null;
    }
}
