<?php

namespace Modules\Rule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Model
{
    use SoftDeletes;
    protected $fillable = ['description'];



}


