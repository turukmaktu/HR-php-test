<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Order extends Model
{
    /*
     * продукты заказа
     */
    public function products(){
        return $this->hasManyThrough(
            Product::class,
            OrderProduct::class,
            'order_id',
            'id',
            'id',
            'id'
        );
    }

    public function produtBasket(){
        return $this->hasMany(
            OrderProduct::class,
            'order_id',
            'id'
        );
    }

    /*
     * партнер заказа
     */
    public function partner(){
        return $this->hasOne(
            Partner::class,
            'id',
            'partner_id'
        );
    }
}
