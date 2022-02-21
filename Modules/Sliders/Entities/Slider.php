<?php

namespace Modules\Sliders\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends Model
{
    use DeletedBy;

    /**
     * Set slider fillable fields
     * @var array
    */
    protected $fillable = ['title', 'image', 'type', 'link'];

    /**
     * User That Deleted The Question
     *
     * @return BelongsTo
     */
    public function DeletedBy() :BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("uploads/Sliders/$this->id/$value") : null;
    }

    public function gettypeAttribute($value)
    {
        if ($value == 1) {
            return 'اسلایدر اصلی';
        }

    }

}
