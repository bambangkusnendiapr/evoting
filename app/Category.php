<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function kandidats()
    {
        return $this->hasMany(Kandidat::class);
    }
}
