<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function musician()
    {
        return $this->belongsTo('App\Models\Musician');
    }
}
