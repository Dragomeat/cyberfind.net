<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
