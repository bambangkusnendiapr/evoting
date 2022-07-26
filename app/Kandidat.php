<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
