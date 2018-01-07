<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';

    public function products() {
        return $this->belongsToMany(
            'App\Products',
            'genre_product',
            'product_id',
            'genre_id');
    }
}
