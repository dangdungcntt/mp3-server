<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function product_type() {
        return $this->belongsTo('App\ProductType', 'id', 'type');
    }
}
