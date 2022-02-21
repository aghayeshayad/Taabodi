<?php

namespace Modules\ContactUs\Entities;

use App\Http\Traits\Dashboard\DeletedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use AppUser;

class FormContactUs extends Model
{
    use DeletedBy;

    /**
     * Set table filllable fields
     * @var array
     */
    protected $fillable = ['name', 'email', 'subject', 'mobile', 'message', 'deleted_by'];

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
