<?php

namespace Modules\Notices\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model
{
    use DeletedBy;

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['title', 'email', 'deleted_by'];

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
