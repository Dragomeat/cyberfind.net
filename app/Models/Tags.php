<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tags.
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tags whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tags whereName($value)
 * @mixin \Eloquent
 */
class Tags extends Model
{
    public $timestamps = false;

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
