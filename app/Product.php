<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function vendor(){
        return $this->hasOne(Vendor::class,'id', 'vendor_id' );
    }
}
