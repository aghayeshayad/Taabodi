<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'نمایش' : 'عدم نمایش';
    }
}
