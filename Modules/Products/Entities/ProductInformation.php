<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductInformation extends Model
{
    protected $fillable = ['information'];

    public function getInformationAttribute($value)
    {
        return $value ? json_decode($value) : [];
    }
}
