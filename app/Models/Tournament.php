<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Scout\Searchable;

/**
 * Class Tournament.
 */
class Tournament extends Model
{
    use Searchable;

    protected $dates = [
        'holding_at',
        'qualification_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'material');
    }

    /**
     * @return string
     */
    public function searchableAs()
    {
        return 'title';
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getHoldingAtFormattedAttribute($value)
    {
        return $this->holding_at->format('d.m.Y');
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getQualificationAtFormattedAttribute($value)
    {
        return $this->qualification_at->format('d.m.Y');
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getCreatedAtFormattedAttribute($value)
    {
        return $this->created_at->format('d.m.Y');
    }
}
