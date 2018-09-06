<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $fillable = ['name', 'brief', 'lyric',' musician_id'];

    public function musician()//一个作品属于一个音乐人
    {
        return $this->belongsTo('App\Models\Musician');
    }
}
