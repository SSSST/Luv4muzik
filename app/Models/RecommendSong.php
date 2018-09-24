<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class RecommendSong extends Model
{
    public $fillable = ['title', 'brief', 'song_name', 'user_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function song()
    {
        return $this->belongsTo('App\Models\Song');
    }
}
