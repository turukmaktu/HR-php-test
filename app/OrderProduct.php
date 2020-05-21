<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function parent(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
