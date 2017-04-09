<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
