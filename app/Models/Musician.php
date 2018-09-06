<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $fillable = ['name', 'brief', 'can_be_edited'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function changeEdit()
    {
        $can_be_edited = !$this->can_be_edited;

        $this->update(['can_be_edited' => $can_be_edited]);
    }
}
