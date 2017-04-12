<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Feedback.
 */
class Feedback extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'subject',
        'email',
        'message',
        'is_resolved',
    ];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return Builder
     */
    public function scopeNoResolved(Builder $builder): Builder
    {
        return $builder->where('is_resolved', false);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return Builder
     */
    public function scopeOrderResolved(Builder $builder): Builder
    {
        return $builder->orderBy('is_resolved', 'asc');
    }
}
