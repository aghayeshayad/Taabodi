<?php

namespace Modules\AboutUs\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutUs extends Model
{
    use DeletedBy, Sluggable;

    protected $table = 'about-uses';

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['title', 'slug', 'meta_description', 'short_description', 'description',
        'image', 'file', 'properties', 'why_us', 'deleted_by'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
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

    public function getPropertiesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("uploads/About/$this->id/$value") : null;
    }

    public function getFileAttribute($value)
    {
        return $value ? asset("uploads/About/$this->id/$value") : null;
    }

}
