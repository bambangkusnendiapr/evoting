<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'tb_status';
    public function voter()
    {
        return $this->belongsTo(Voter::class);
    }
}
