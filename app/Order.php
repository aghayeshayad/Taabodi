<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;

class Order extends Model
{
    protected $guarded = [];

    public function Information()
    {
        return $this->hasMany(OrderInfo::class, 'order_id', 'id');
    }

    public function Invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id');
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'پرداخت شده' : 'پرداخت نشده';
    }
}
