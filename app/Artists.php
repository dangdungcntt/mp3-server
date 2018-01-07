<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $table = 'artists';

    public function artist_type() {
        return $this->belongsTo('App\ArtistType');
    }

    public function products() {
        return $this->belongsToMany(
            'App\Products',
            'artist_product',
            'product_id',
            'artist_id');
    }
}
