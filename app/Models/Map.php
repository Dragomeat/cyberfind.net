<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'team_map';
    protected $fillable = ['map'];
    public $timestamps = false;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
