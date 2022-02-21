<?php

namespace Modules\Faq\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use DeletedBy,Sluggable;

    protected $fillable = ['title','slug', 'question', 'answer', 'status', 'deleted_by'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function DeletedBy() :BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

}
