<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';

    public function products() {
        return $this->hasMany('App\Products', 'type', 'id');
    }
}
