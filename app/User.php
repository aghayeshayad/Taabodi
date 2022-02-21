<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile', 'password', 'email', 'role', 'verified', 'ban', 'address', 'postal_code', 'city',
        'name', 'mobile', 'password', 'email', 'verified', 'ban'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function ExpiredDiscounts()
    {
        return $this->hasMany(ExpiredDiscounts::class, 'user_id');
    }

    /**
     * Check user used product discount
     *
     * @param int $id //product id
     * @return bool
     */
    public function userUsedDiscount($id)
    {
        return auth()->user()->ExpiredDiscounts()->where('product_id', $id)->exists();
    }
}
