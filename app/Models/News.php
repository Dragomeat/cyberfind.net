<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class News.
 */
class News extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return Builder
     */
    public function scopeLatestPublished(Builder $builder): Builder
    {
        return $builder->latest('published_at')
            ->published();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return Builder
     */
    public function scopeLatest(Builder $builder): Builder
    {
        return $builder->orderBy('published_at', 'desc');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return Builder
     */
    public static function scopePublished(Builder $builder): Builder
    {
        return $builder
            ->where('published_at', '<=', Carbon::now())
            ->where('status', 'published');
    }
}
