<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistType extends Model
{
    protected $table = 'artist_type';

    public function artist() {
        return $this->hasMany('App\Artist');
    }
}
