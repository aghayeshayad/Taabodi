<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;

class OrderInfo extends Model
{
    protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
