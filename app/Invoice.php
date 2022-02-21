<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Products\Entities\Product;

class Invoice extends Model
{
    protected $guarded = [];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function Information()
    {
        return $this->hasMany(OrderInfo::class, 'order_id', 'id');
    }
    public function Product()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function User()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function Address()
    {
        return $this->hasMany(Address::class, 'user_id');
    }


}
