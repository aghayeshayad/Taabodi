<?php

namespace Modules\ContactUs\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class ContactUs extends Model
{
    use DeletedBy, Sluggable;

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['title', 'slug', 'meta_description', 'short_description', 'description',
        'phone', 'mobile', 'email', 'address', 'lat', 'lan', 'deleted_by'];

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


}
