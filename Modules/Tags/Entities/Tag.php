<?php

namespace Modules\Tags\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tag extends Model
{
    use  DeletedBy;

    /**
     * Tags table fillable fields
     *
     * @var array
     */
    protected $fillable = ['type', 'title', 'deleted_at'];

    /**
     * User That Deleted The Content
     *
     * @return BelongsTo
     */
    public function DeletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
